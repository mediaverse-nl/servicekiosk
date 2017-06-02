<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = ['id', 'user_id'];

    public static function status()
    {
        return collect([
            'Online' => 'Online',
            'Offline' => 'Offline',
            'Non' => 'Non',
        ]);
    }
}
