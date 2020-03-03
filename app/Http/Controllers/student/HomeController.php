<?php

namespace Entern\Http\Controllers\student;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Entern\student;
use Entern\Course;
use Entern\Firm;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function __construct(){
    	$this->middleware('auth');
    }


    public function index(){

        if($this->checkAttachment()){
            if($this->hasFirmSet() != null){
                $user = Auth::user()->with('course')->first();
                return view('student.area.home',['student'=>$user]);
            }else{
                return view('student.firm.setfirm');
            }
            
        }else{
            return 'not attached';
        }
        
        
    }

    public function checkAttachment(){
        $attach = Auth::user()->level()->first();
        $attach = $attach->attachment()->first();
        if($attach == null){
            return false;
        }else{
            $start = Carbon::parse($attach->start);
            return true;
        }
    	
    }

    public function hasFirmSet(){
        return Auth::user()->firm()->first();
    }

}
