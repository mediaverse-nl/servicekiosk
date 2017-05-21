<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $table = 'button';

    public $timestamps = true;

    protected $guarded = [];

    public function console()
    {
        return $this->belongsTo('App\Console', 'console_id', 'id');
    }

    public function buttonParent()
    {
        return $this->belongsTo('App\Button', 'button_id');
    }

    public function buttonChildren()
    {
        return $this->hasMany('App\Button', 'button_id');
    }

    public static function buttonType()
    {
        return collect([
            'website' => 'website',
            'category' => 'category',
            'non' => 'non',
        ]);
    }

}
