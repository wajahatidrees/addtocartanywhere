<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }



    


    /**
     * Execute the job.
     * @return void
     */
    public function handle()
    {

        try {
            $activeShop = auth()->user();
            $shopResponse = $activeShop->api()->rest('GET', '/admin/shop.json');
 
 
            $shopData = [];
            if (isset($shopResponse['body']['shop'])) {
                $shopData = $shopResponse['body']['shop'];
            }
 
 
            $themeResponse = $activeShop->api()->rest('GET', '/admin/api/2025-01/themes.json');
            $themes = $themeResponse['body']['themes'] ?? [];
            $mainTheme = collect($themes)->firstWhere('role', 'main');
 
 
            $fullAddress = '';
            $address1 = !empty($shopData['address1']) ? $shopData['address1'] : null;
            $address2 = !empty($shopData['address2']) ? $shopData['address2'] : null;
 
 
            if ($address1 && $address2) {
                $fullAddress = $address1 . ', ' . $address2;
            } elseif ($address1) {
                $fullAddress = $address1;
            } elseif ($address2) {
                $fullAddress = $address2;
            }
 
 
            $data = [
                'name' => $shopData['name'] ?? null,
                'domain' => $shopData['domain'] ?? null,
                'email' => $shopData['email'] ?? null,
                'shop_owner' => $shopData['shop_owner'] ?? null,
                'phone' => $shopData['phone'] ?? null,
                'plan_display_name' => $shopData['plan_display_name'] ?? null,
                'address' => $fullAddress ?? null,
                'country' => $shopData['country_name'] ?? null,
                'theme_store_id' => $mainTheme['theme_store_id'] ?? null,
                'theme_name' => $mainTheme['name'] ?? null,
                'app_history_type' => 'installed'
            ];
 
 
            $res = Http::withHeaders([
                'app-handle' => 'your_app_handle' // Replace with your app handle
            ])->post('https://sf-admindashboard.extendons.com/api/shop/app-install', $data);
        } catch (\Throwable $e) {
            logger()->error('App install job failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
        }
 
        Mail::to($this->user['email'])->send(new WelcomeEmail($this->user));
    }
}


