<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    
    protected $fillable =[
       'level','duration','start'
    ];


    public function level(){
    	return $this->belongsTo('Entern\SemYear','level');
    }

    public function assessments(){
    	return $this->hasMany('Enter\Assessment','attachment_id');
    }
}
