<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    
    protected $fillable = ['name','description','school'];


    public function school(){

    	return $this->belongsTo('Entern\School','school');
    }

    public function courses(){

    	return $this->hasMany('Entern\Course','department');
    }

    public function lecturers(){
    	return $this->hasMany('Entern\Lecturer','department');
    }
}
