<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    use Notifiable;

    public function student_details() {
        return $this->hasOne('Entern\Student', 'user_id');
    }

    public function lec_details() {
        return $this->hasOne('Entern\lecturer', 'user_id');
    }

    public function is_hod() {
        return $this->lec_details->isHod;
    }
}
