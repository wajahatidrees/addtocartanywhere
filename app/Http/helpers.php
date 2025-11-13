<?php
use Carbon\Carbon;

function custom_route($name, $parameters = [], $absolute = true)
{
    $shop = Auth::user();
    $parameters = Arr::wrap($parameters);
    Arr::set($parameters, 'shop', $shop->name);
    Arr::set($parameters, 'host', app('request')->input('host'));
    return route($name, $parameters, $absolute);
}

function getAppName() 
{
     return 'HidePriceBilling';
}

function calculateDuration($createdAt, $deletedAt)
{
    $createdAt = Carbon::parse($createdAt);
    $deletedAt = Carbon::parse($deletedAt);
    $duration = $deletedAt->diff($createdAt);


    if ($duration->days > 0) {
        return "{$duration->days} days";
    } elseif ($duration->h > 0) {
        return "{$duration->h} hours";
    } elseif ($duration->i > 0) {
        return "{$duration->i} minutes";
    } else {
        return "less than a minute";
    }
}
function getTourCutoffDate()
{
    return '2000-07-08 00:00:00';
}

