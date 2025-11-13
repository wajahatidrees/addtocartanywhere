<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\UserTourProgress;

use Illuminate\Support\Facades\DB;

class TourService
{
    public function checkTourStep($activeShop, $page)
    {
        if ($activeShop->tourProgress()->where('page', 'all')->exists()) {
            return false;
        }
        return !$activeShop->getTourProgressPage($page);
    }

    public function checkSetupGuideProgress($activeShop){
        $pageChecks = [
            'app_language' => true,
            'app_setting' => $activeShop->setting !== null,
            'app_embed' => $this->checkAppEmbed($activeShop)
        ];

        return $pageChecks;
    }

    public function checkAppEmbed($shop)
    {
        try {
            $themes = $shop->api()->rest('GET', '/admin/api/2023-04/themes.json');
            $mainTheme = collect($themes['body']['themes'])->firstWhere('role', 'main');
            if (!$mainTheme) {
                return false;
            }

            $settingsData = $shop->api()->rest('GET', "/admin/api/2023-04/themes/{$mainTheme['id']}/assets.json", [
                'asset[key]' => 'config/settings_data.json'
            ]);

            if (!$settingsData) {
                return false;
            }

            $settingsJson = json_decode($settingsData['body']['asset']['value'], true);
            $blocks = $settingsJson['current']['blocks'] ?? [];
            foreach ($blocks as $block) {
            
                if (isset($block['type'])  && strpos($block['type'], 'eosh_add_to_cart') !== false) {
                    return !$block['disabled'];
                }
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

}
