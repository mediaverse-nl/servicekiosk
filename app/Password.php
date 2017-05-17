<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $table = 'password_resets';

    protected $guarded = ['token'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
