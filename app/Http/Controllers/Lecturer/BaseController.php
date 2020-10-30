<?php

namespace Entern\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Auth;
use Entern\Lecturer as Lec;

class BaseController extends Controller
{
    
    public function __construct(){
    
    	$this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $lec = $user->lec_details;
    	return view('lecturer.content.dashboard',['lec'=> $lec]);
    	
    }
}
