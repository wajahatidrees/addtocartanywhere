<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'phone', 'feature', 'details', 'store_url', 'subscription_type',
        ];

}
