<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    public function user(){

        return $this->belongsTo('App\User','sender_id');
    }

    public function user2(){

        return $this->belongsTo('App\User','reciever_id');
    }
}
