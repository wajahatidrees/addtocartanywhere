<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ShopData extends Model
{
   protected $fillable = [
       'name',
       'domain',
       'email',
       'shop_owner',
       'phone',
       'plan_display_name',
       'address',
       'country',
       'theme_store_id',
       'theme_name',
       'status',
       'user_id'
   ];
}
