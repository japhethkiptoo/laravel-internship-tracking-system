<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    

    protected $fillable = ['name','description'];

    public function departments(){

    	return $this->hasMany('Entern\Department','school');
    	
    }
}
