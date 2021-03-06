<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';

    protected $guarded = ['id', 'ticket_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function message()
    {
        return $this->hasMany('App\Message', 'ticket_id');
    }

    public static function status()
    {
        return collect([
            'answered' => 'answered',
            'pending' => 'pending',
            'completed' => 'completed',
        ]);
    }
}
