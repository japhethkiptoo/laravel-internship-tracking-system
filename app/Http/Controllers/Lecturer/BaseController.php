<?php

namespace Entern\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Auth;
use Entern\Lecturer as Lec;

class BaseController extends Controller
{
    
    public function __construct(){
    
    	$this->middleware('auth:lec');
    }

    public function index(){

    	$user = Lec::findOrFail(Auth::id());
       
    	return view('lecturer.content.dashboard',['lec'=> $user]);
    	
    }
}
