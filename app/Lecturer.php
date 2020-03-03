<?php

namespace Entern;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Lecturer extends Authenticatable
{   

	use Notifiable;

	
    protected $fillable = [
      'name','phone','department','email','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_hod(){
        return (Auth::guard('lec')->user()->isHod == 1)? true : false;
    }


    public function department(){
    	return $this->belongsTo('Entern\Department','department');
    }

    public function assigned(){
        return $this->hasMany('Entern\Assigned','lecturer_id');
    }

    public function assessment(){
        return $this->morphMany('Entern\Assessment', 'assessor');
    }
}
