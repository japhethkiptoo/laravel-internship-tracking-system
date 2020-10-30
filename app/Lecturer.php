<?php

namespace Entern;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Lecturer extends Model
{   
	
    protected $fillable = [
      'department', 'user_id', 'isHod'
    ];


    public function user() {
        return $this->belongsTo('Entern\User', 'user_id')->withDefault();
    }

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
