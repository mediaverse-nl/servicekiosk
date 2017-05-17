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

    public static function status()
    {
        return collect([
            'belfius' => 'belfius',
            'creditcard' => 'creditcard',
            'ideal' => 'ideal',
            'kbc' => 'kbc',
            'mistercash' => 'mistercash',
            'sofort' => 'sofort',
        ]);
    }
}
