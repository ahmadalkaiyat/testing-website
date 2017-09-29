<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['user_id','contact_person','sms','registration_name','phone_number','email_address','about_shop'];

    public function user(){

        return $this->belongsTo('App\User');
    }
}


