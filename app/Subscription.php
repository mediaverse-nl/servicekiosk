<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscription';

    public function console()
    {
        return $this->belongsTo('App\Console');
    }

    public function subscriptionType()
    {
        return $this->belongsTo('App\SubScriptionType');
    }
}
