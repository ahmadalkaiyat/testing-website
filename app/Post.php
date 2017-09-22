<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body','status_id','photo_id','user_id','section_id'
    ];

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
