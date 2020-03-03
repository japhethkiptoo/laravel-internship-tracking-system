<?php

namespace Entern;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    
    protected function rules(){
      return [
             'firm' => 'required|string',
             'address' => 'required|string',
             'tel' => 'required|numeric|min:12',
             'fax' => 'required|numeric|min:4', 
             'site' => 'required|string',
             'supervisor_name' => 'required|string',
             'supervisor_email' => 'required|email',     
            
         ];
    }
    public function student(){
    	return $this->belongsTo('Entern\Student');
    }

    public function supervisor(){
        return $this->belongsTo('Entern\supervisor','supervisor');
    }
}
