<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BillingController extends Controller
{
    public function index(){
        return view('billing.index');
    }


    // public function billingPlan()
    // {
    //    $shop = Auth::user();
    //    $route = isset($shop['plan_id']) && !empty($shop['plan_id']) ? 'dashboard' : 'plans.index';
    //    return redirect()->route($route, [
    //        'shop' => $shop->name,
    //        'host' => request()->input('host')
    //    ]);
    // }
    

    // public function dashboard(){
    //     return '123';
    // }


    public function billingPlan($plan)
    {
        
        $shop = Auth::user();
        if ($plan == "Basic") {
            return redirect()->route('billing', ['plan' => 1, 'shop' => Auth::user()->name, 'host' => app('request')->input('host')]);
        } 
        else {
            return redirect()->route('billing', ['plan' => 2, 'shop' => Auth::user()->name, 'host' => app('request')->input('host')]);
        } 
    }

}
