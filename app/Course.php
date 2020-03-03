<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $fillable =[
       'name','description','department'
    ];


    public function department(){

    	return $this->belongsTo('Entern\Department','department');
    }

    public function student(){

    	return $this->hasOne('Entern\Student','course');
    }

    public function levels(){
        return $this->hasMany('Entern\SemYear');
    }

    public function attach(){
    	return $this->hasMany('Entern\Attach');
    }
}
