<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = ['name','is_for_shop','photo_id'];


    public function photo(){

        return $this->belongsTo('App\photo');
    }


}
