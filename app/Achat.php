<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    public function user(){

        return $this->belongsTo('App\User','user_id');
    }

    public function services(){
        return $this->belongsTo('App\Service','service_id');

    }

}
