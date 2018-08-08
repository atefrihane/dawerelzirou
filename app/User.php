<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','tel','ville','description','image','diplomes','langues',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function services(){

        return $this->hasMany('App\Service');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }


    public function likes(){
        return $this->hasMany('App\Like');

    }


    public function achats(){

        return $this->hasMany('App\Achat');
    }

    public function inboxs(){

        return $this->hasMany('App\Inbox');
    }
}
