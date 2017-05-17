<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';

    protected $guarded = ['id', 'user_id', 'customerId'];

    public function mollie()
    {
        return $this->belongsTo('App\Mollie', 'client_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
