<?php

namespace Entern;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname', 'email','regno','idno','phone','course','yr','sem','sex', 'password','level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function assessment(){
        return $this->hasMany('Entern\Assessment','student_id');
    }

    public function course(){
    	return $this->belongsTo('Entern\Course','course');
    }

    public function supervisor(){
        return $this->belongsTo('Entern\Supervisor','supervisor');
    }

    public function firm(){
        return $this->hasOne('Entern\Firm');
    }

    public function field(){
        return $this->hasMany('Entern\Fieldwork');
    }
    public function level(){
        return $this->belongsTo('Entern\SemYear','level_id');
    }

    public function weeks(){
        return $this->hasMany('Entern\Week','student_id');
    }

    
}
