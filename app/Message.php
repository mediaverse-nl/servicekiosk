<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket', 'ticket_id');
    }

    public function message()
    {
        return $this->belongsTo('App\Message', 'user_message_id');
    }

    public function messageParent()
    {
        return $this->hasMany('App\Message', 'user_message_id');
    }
}
