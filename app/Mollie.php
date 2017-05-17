<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mollie extends Model
{
    protected $table = 'mollie_profile';

    protected $guarded = ['client_id'];

    public function client()
    {
        return $this->hasMany('App\Client', 'client_id');
    }
}
