<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Fieldwork extends Model
{  
	protected $fillable = [
        'week','day','student_id', 'work','comment',
    ];

    protected function rules(){
    	return [
             'work' => 'required|min:10',
        ];
    }

    protected $dates = ['created_at'];
   
    public function student(){
    	return $this->belongsTo('Entern\Student');
    }

}
