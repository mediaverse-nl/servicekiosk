<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    protected $table = 'subscription_type';

    public function subscription()
    {
        return $this->hasMany('App\Subscription');
    }
}
