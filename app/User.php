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
        'name', 'email', 'password','role_id','status_id','photo_id','country_id','category_id',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function section()
    {
        return $this->hasMany('App\Section');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
