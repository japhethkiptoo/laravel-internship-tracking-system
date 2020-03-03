<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
    	'student_id','assessor_type','assessor_id','data','comment','attachment_id'
    ];

    public function student(){
    	return $this->belongsTo('Entern\Student','student_id');
    }

	public function assessor(){
	   	return $this->morphTo();
	}

	public function attachment(){
        return $this->belongsTo('Entern\Attachment','attachment_id');
	}

	public function getDataAttribute($value){
		return unserialize($value);
	}
}
