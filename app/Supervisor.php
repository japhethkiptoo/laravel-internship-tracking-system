<?php

namespace Entern;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supervisor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','email','phone',
    ];
    
    public function students(){
        return $this->hasMany('Entern\Student','supervisor');
    }

    public function firm(){
    	return $this->hasOne('Entern\Firm','supervisor');
    }
    
    public function assessment(){
        return $this->morphMany('Entern\Assessment', 'assessor');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
}
