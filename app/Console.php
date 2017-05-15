<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $table = 'console';

    protected $timestamps = true;

    protected $guarded = [];

    public function button()
    {
        return $this->HasMany('App\Button');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}