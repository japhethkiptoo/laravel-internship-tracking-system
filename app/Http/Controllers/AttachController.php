<?php

namespace Entern\Http\Controllers;

use Illuminate\Http\Request;
use Entern\Attach;
use Entern\Course;

class AttachController extends Controller
{
    
    public function __construct(){
    
        $this->middleware('auth:lec');
    }


    public function attachSet(Request $request){

    	$course = Course::findOrFail($request->course_id);

    	$attach = new Attach();
    	$attach->start = $request->start;
    	$attach->duration = $request->duration;
    	$attach->sem = $request->semister;
    	$attach->yr = $request->year;

    	$course->attach()->save($attach);

    	return $attach;
    }

}
