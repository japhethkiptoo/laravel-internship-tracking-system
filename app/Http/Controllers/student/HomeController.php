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


    public function index() {

        if($this->checkAttachment()){
            if($this->hasFirmSet() != null){
                $user = Auth::user();
                $student = $user->student_details->with('course')->first(); //Auth::user()->student_details()->with('course')->first();
                return view('student.area.home',['student'=>$student, 'user'=> $user ]);
            }else{
                return view('student.firm.setfirm');
            }
            
        }else{
            return view('student.profile.notattached');
        }
    }

    public function checkAttachment(){
        $student = Auth::user()->student_details;
        $attach = ($student) ? $student->level()->first() : null;
        $attach = ($attach) ? $attach->attachment()->first() : null;
        if($attach == null){
            return false;
        }else{
            $start = Carbon::parse($attach->start);
            return true;
        }
    }

    public function hasFirmSet(){
        return (Auth::user() && Auth::user()->student_details->firm) ? Auth::user()->student_details->firm()->first() : null;
    }

}
