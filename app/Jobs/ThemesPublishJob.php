<?php namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use stdClass;

class ThemesPublishJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Shop's myshopify domain
     *
     * @var ShopDomain|string
     */
    public $shopDomain;

    /**
     * The webhook data
     *
     * @var object
     */
    public $data;

    /**
     * Create a new job instance.
     *
     * @param string   $shopDomain The shop's myshopify domain.
     * @param stdClass $data       The webhook data (JSON decoded).
     *
     * @return void
     */
    public function __construct($shopDomain, $data)
    {
        $this->shopDomain = $shopDomain;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $activeShop = User::where('name', $this->shopDomain)->first();
 
 
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
                'theme_name' => $mainTheme['name'] ?? null
            ];
 
 
            $res = Http::withHeaders([
                'app-handle' => 'your_app_handle' // Replace with your app handle
            ])->asJson()->post('https://Addtocartanywhere.test/api/shop/theme-publish', $data);
        } catch (\Throwable $e) {
            logger()->error('Theme publish job failed :- ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
        }
 
 
        return true;
    }
}













