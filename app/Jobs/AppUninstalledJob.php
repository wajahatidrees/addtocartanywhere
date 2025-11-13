<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Http;
use Osiset\ShopifyApp\Actions\CancelCurrentPlan;
use Osiset\ShopifyApp\Contracts\Commands\Shop as IShopCommand;
use Osiset\ShopifyApp\Contracts\Queries\Shop as IShopQuery;
use App\Models\User;

class AppUninstalledJob extends \Osiset\ShopifyApp\Messaging\Jobs\AppUninstalledJob
{

   public function handle(
        IShopCommand $shopCommand,
        IShopQuery $shopQuery,
        CancelCurrentPlan $cancelCurrentPlanAction
    ): bool {



        try {
            $data = [
                'domain' => $this->data->domain,
                'app_history_type' => 'uninstalled'
            ];
 
 
            $res = Http::withHeaders([
                'app-handle' => 'your_app_handle' // Replace with your app handle
            ])->post('https://Addtocartanywhere.test/api/shop/app-uninstall', $data);
        } catch (\Throwable $e) {
            logger()->error('App uninstall job failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
        }
 

        $data = $this->data;
        $result = parent::handle($shopCommand, $shopQuery, $cancelCurrentPlanAction);
        $shop = User::withTrashed()->where('name', '=', $data->domain)->first();
        $duration = calculateDuration($shop->created_at, $shop->deleted_at);
        dispatch(new SendUninstallEmail([
            'name' => $data->name,
            'email' => $data->email,
            'domain' => $data->domain,
            'duration' => $duration
        ]));
        $shop->update(['email_sent' => false]);
        $shop->setAttribute('created_at', null);
        $shop->save();
        return $result;
    }
}


