<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name','status_id','user_id',
    ];

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
