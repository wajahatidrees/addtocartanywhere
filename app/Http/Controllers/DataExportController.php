<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShopData;


class DataExportController extends Controller
{
   private $appHandle = 'add-to-cart-on-collection';


   public function index(Request $request)
   {
       $nextUser = User::whereNotIn('id', function ($query) {
           $query->select('user_id')->from('shop_data');
       })->first();


       return view('shop-data.index', compact('nextUser'));
   }


   public function fetch(Request $request)
   {
       $nextUser = User::whereNotIn('id', function ($query) {
           $query->select('user_id')->from('shop_data');
       })->first();


       if (!$nextUser) {
           return response()->json([
               'completed' => true,
               'message' => 'All shops processed.'
           ]);
       }


       try {
           $shopResponse = $nextUser->api()->rest('GET', '/admin/shop.json');


           $shop = [];
           if (isset($shopResponse['body']['shop']))
               $shop = $shopResponse['body']['shop'];


           $query = <<<GRAPHQL
           query ThemeList {
               themes(first: 10) {
                   edges {
                       node {
                           id
                           name
                           role
                           themeStoreId
                       }
                   }
               }
           }
           GRAPHQL;


           $themeResponse = $nextUser->api()->rest('GET', '/admin/api/2025-01/themes.json');
            $themes = $themeResponse['body']['themes'] ?? [];
            $mainTheme = collect($themes)->firstWhere('role', 'main');

           $fullAddress = '';
           $address1 = isset($shop['address1']) && !empty($shop['address1']) ? $shop['address1'] : null;
           $address2 = isset($shop['address2']) && !empty($shop['address2']) ? $shop['address2'] : null;
           if ($address1 && $address2) {
               $fullAddress = $address1 . ', ' . $address2;
           } elseif ($address1) {
               $fullAddress = $address1;
           } elseif ($address2) {
               $fullAddress = $address2;
           }


           ShopData::create([
               'user_id' => $nextUser->id,
               'name' => $shop['name'] ?? null,
               'domain' => $shop['domain'] ?? null,
               'email' => $shop['email'] ?? null,
               'shop_owner' => $shop['shop_owner'] ?? null,
               'phone' => $shop['phone'] ?? null,
               'plan_display_name' => $shop['plan_display_name'] ?? null,
               'address' => $fullAddress ?? null,
               'country' => $shop['country_name'] ?? null,
               'theme_store_id' => $mainTheme['theme_store_id'] ?? null,
               'theme_name' => $mainTheme['name'] ?? null,
               'status' => 'completed',
           ]);


           return response()->json([
               'done' => false,
               'message' => "Processed user ID: {$nextUser->id}",
               'user_id' => $nextUser->id,
           ]);
       } catch (\Exception $e) {
           if (str_contains($e->getMessage(), 'Invalid shop domain')) {
               ShopData::create([
                   'user_id' => $nextUser->id,
                   'name' => null,
                   'domain' => null,
                   'email' => null,
                   'phone' => null,
                   'plan_display_name' => null,
                   'country' => null,
                   'theme_store_id' => null,
                   'theme_name' => null,
                   'status' => 'completed',
               ]);
           }


           return response()->json([
               'done' => false,
               'error' => true,
               'message' => $e->getMessage(),
           ], 500);
       }
   }


   public function export()
   {
       $shopData = ShopData::all();


       $csvHeader = [
           'Name',
           'Domain',
           'Email',
           'Shop Owner',
           'Phone',
           'Plan Display Name',
           'Address',
           'Country',
           'Theme ID',
           'Theme Name',
           'App Handle',
           'Created At',
       ];


       $rows = $shopData->map(function ($shop) {
           return [
               $shop->name,
               $shop->domain,
               $shop->email,
               $shop->shop_owner,
               $shop->phone,
               $shop->plan_display_name,
               $shop->address,
               $shop->country,
               $shop->theme_store_id,
               $shop->theme_name,
               $this->appHandle,
               $shop->created_at,
           ];
       });


       $csvContent = fopen('php://temp', 'r+');
       fputcsv($csvContent, $csvHeader);


       foreach ($rows as $row) {
           fputcsv($csvContent, $row);
       }


       rewind($csvContent);
       $csv = stream_get_contents($csvContent);
       fclose($csvContent);


       $filename = $this->appHandle . '_data_export.csv';


       return response($csv)
           ->header('Content-Type', 'text/csv')
           ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
   }
}
