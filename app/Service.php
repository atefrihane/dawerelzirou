<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{



    public function user(){

        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment','services_id');

    }

    public function likes(){
        return $this->hasMany('App\Like');

    }

    public function categorie(){
return $this->belongsTo('App\Category','type');

    }

    public function achats(){

        return $this->hasMany('App\Achat');
    }
}
