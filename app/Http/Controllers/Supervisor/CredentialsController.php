<?php

namespace Entern\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class CredentialsController extends Controller
{   

	  use AuthenticatesUsers;

    
    protected $redirectTo = '/supervisor';
    

    public function __construct(){
        
        $this->middleware('guest:sup')->except('logout');
    }


    public function loginForm(){
    	
    	return view('supervisor.auth.suplogin');
    }


    public function login(Request $request){
    	//validate
   	   $this->validateLogin($request);

   	   $credintials = $this->credentials($request);
   	   

   	   if(Auth::guard('sup')->attempt($credintials)){
          
          $this->sendLoginResponse();
   	   }

   	   return $this->sendFailedLoginResponse($request);

    }

    protected function validateLogin(Request $req){

   	   return $this->validate($req,[
            $this->username() => 'required|string',
            'password' => 'required|string'
   	   ]);
    }

  	protected function credintials(Request $req){
  	   	   
  	   	   return [$this->username() => $req->get($this->username()),
  	   	   	               'password'=> $req->get('password')]; 
  	}
  

  	protected function sendLoginResponse(){
  	   	   
  	   	   return redirect()->intended($this->redirectTo);
  	}



    public function logout(){
          Auth::guard('sup')->logout();
          return redirect()->route('sup.dashboard');
      }

}
