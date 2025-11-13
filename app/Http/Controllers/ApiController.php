<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\User;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getSetting( Request $request)
    {
        $shopDomain = $request->domain;
        $userId = User::where('name',$shopDomain)->pluck('id');
        $setting = Setting:: where('user_id', $userId)->first();
        return response()->json([
            'setting' => $setting
        ]);
    }
}
