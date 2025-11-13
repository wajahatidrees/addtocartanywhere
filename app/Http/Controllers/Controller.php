<?php

namespace App\Http\Controllers;

use App\Services\TourService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $userTourProgress;

    public function __construct(TourService $userTourProgress)
    {
        $this->userTourProgress = $userTourProgress;
    }
    
    public function checkAndCompleteTourStep(Request $request, $activeShop)
    {
        $pages = ['app_language', 'app_setting', 'app_embed'];
        $showTourModal = false;
        $tourStep = '';
        $isModalFlow = $request->input('flow') === 'modal';
        if (!$isModalFlow) {
            foreach ($pages as $page) {
                if ($this->userTourProgress->checkTourStep($activeShop, $page)) {
                    $showTourModal = true;
                    $tourStep = $page;
                    $activeShop->setTourProgressPage($tourStep);
                    break;
                }
            }
        }
        return compact('showTourModal', 'tourStep', 'isModalFlow');
    }

}
