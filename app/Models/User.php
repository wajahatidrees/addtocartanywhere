<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Osiset\ShopifyApp\Contracts\ShopModel as IShopModel;
use Osiset\ShopifyApp\Traits\ShopModel;

class User extends Authenticatable implements IShopModel
{
    use HasApiTokens, HasFactory, Notifiable;
    use ShopModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tourProgress()
    {
        return $this->hasMany(UserTourProgress::class);
    }

    public function setting() 
    {
        return $this->hasOne(Setting::class);
    }

    public function getTourProgressPage($page)
    {
        $cutoffDate = getTourCutoffDate();
        if ($this->created_at < $cutoffDate) { 
        return true;
        }
        return $this->tourProgress()->where('page', $page)->exists();
    }

    public function setTourProgressPage($page)
    {
        $this->tourProgress()->updateOrCreate(['page' => $page]);
    }

   
}


