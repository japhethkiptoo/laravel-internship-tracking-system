<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class week extends Model
{
    

    protected $fillable = ['week','student_id'];

    public function student(){
    	return $this->belongsTo('Entern\Student','student_id');
    }
}
