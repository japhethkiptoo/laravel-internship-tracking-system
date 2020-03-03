<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SemYear extends Model
{
    
    protected $fillable = [
        'year','sem'
    ];

    public function course(){
    	return $this->belongsTo('Entern\Course');
    }

    public function student(){
        return $this->hasMany('Entern\Student','level_id');
    }

    public function attachment(){
    	return $this->hasMany('Entern\Attachment','level');
    }

    public function assigned(){
    	return $this->hasOne('Entern\Assigned','level');
    }


    //scopes
    public function scopeIsAttached($query){
      
      return $query->whereHas('attachment',function($q){
                         
                        //$q->where('start','>=',Carbon::now() );
                     });

    }

    public function scopeIsAvailable($query){
      
      return $query->doesntHave('assigned');

    }
}
