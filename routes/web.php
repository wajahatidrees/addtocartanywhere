<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\DataExportController;
// use App\Http\Middleware\CheckBilling;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['verify.shopify']], function () {
        
    Route::get('/',[SettingController::class, 'billingPlan'])->name('home');
    Route::get('/dashboard', [SettingController::class, 'dashboard'])->name('dashboard');
    Route::get('/general_setting', [SettingController::class,'show'])->name('show-setting');    
    Route::post('/store-setting',[SettingController::class,'store'])->name('/store-setting');



    // Route::post('/save-button-setting', [ButtonSettingController::class, 'store'])->name('save.button.setting');
    // Route::post('/save-button-settings', [SettingController::class,'saveButtonSettings'])->name('store-button-settings');


    Route::get('/collections/handles', [SettingController::class, 'getCollections']);
    Route::get('/faq',function () {return view('faq');})->name('faq');
            // progress bar 
    Route::get('/progress', [SettingController::class, 'getView'])->name('/progress');
    
     // User-Guide
    Route::get('/user-guide', function () {
        return view('video.videoguide');
    })->name('user-guide');

           // Billing plans
    Route::get('plans',[BillingController::class,'index'])->name('billing.index');	
    Route::get('changeplan{plan}',[BillingController::class,'billingPlan'])->name('change.plan');
    Route::post('/tour/nextOrPrevTourStep', [SettingController::class, 'nextOrPrevTourStep'])->name('tour.nextOrPrevTourStep');	

    // Request Feature Submission
    Route::post('/submit-feature-request', [SettingController::class, 'submitFeatureRequest'])->name('submit.feature.request'); 
   
     // Tour Guide Routes
     Route::get('/setupGuide-data', [SettingController::class, 'getSetupGuideData'])->name('setupGuide.data');

    Route::get('/recommendation', function () { return view('recommendation.index'); });

    Route::post('/tour/nextOrPrevTourStep', [SettingController::class, 'nextOrPrevTourStep'])->name('tour.nextOrPrevTourStep');

    Route::get('/shop-data', [DataExportController::class, 'index'])->name('shop-data.index');
    Route::get('/shop-data/fetch', [DataExportController::class, 'fetch'])->name('shop-data.fetch');
    Route::get('/shop-data/export', [DataExportController::class, 'export'])->name('shop-data.export');

});


