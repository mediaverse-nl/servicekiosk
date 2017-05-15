<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $table = 'button';

    protected $timestamps = true;

    protected $guarded = [];

    public function console()
    {
        return $this->belongsTo('App\Console', 'console_id');
    }

    public function buttonParent()
    {
        return $this->belongsTo('App\Button', 'button_id');
    }

    public function buttonChildren()
    {
        return $this->hasMany('App\Button', 'button_id');
    }

}