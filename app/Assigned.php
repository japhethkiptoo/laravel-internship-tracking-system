<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{
    

    protected $fillable = [
         'lecturer_id','level'
    ];

    public function lec(){
    	return $this->belongsTo('Entern\Lecturer','lecturer_id');
    }

    public function level(){
    	return $this->belongsTo('Entern\SemYear','level');
    }
}
