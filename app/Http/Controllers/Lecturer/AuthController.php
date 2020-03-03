<?php

namespace Entern\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Entern\Lecturer as User;

class AuthController extends Controller
{


   use AuthenticatesUsers;

   protected $redirectTo ='/lecturer';


   public function __construct(){
       
       $this->middleware('guest:lec')->except('logout');
   }

   public function loginForm(){

   	   return view('lecturer.auth.leclogin');
   }


   public function login(Request $req){
        //validate
   	   $this->validateLogin($req);

   	   $credintials = $this->credentials($req);
   	   

   	   if(Auth::guard('lec')->attempt($credintials)){
          
          $this->sendLoginResponse();
   	   }

   	   return $this->sendFailedLoginResponse($req);

   }
   
   public function registerForm(){

   	 return view('lecturer.auth.lecregister');
   }

   public function register(Request $request){
     
     $this->validateRegister($request);

     if($this->create($request->all())){
        if(Auth::guard('lec')->attempt($this->credintials($request))){
          $this->sendLoginResponse();
   	   }
     }
     return redirect()->back();
   }

   protected function validateLogin(Request $req){

   	   $this->validate($req,[
            $this->username() => 'required|string',
            'password' => 'required|string'
   	   ]);
   }

   protected function credintials($req){
   	   
   	   return [$this->username() => $req->get($this->username()),
   	   	               'password'=> $req->get('password')]; 
   }


   protected function sendLoginResponse(){
   	   
   	   return redirect()->intended($this->redirectTo);
   }

   protected function validateRegister(Request $req){

   	   $this->validate($req,[
   	   	    'name'=>'required|string',
   	   	    'phone'=>'required', 
            'email'=> 'required|string',
            'password' => 'required|string|min:6',
            'department' => 'required'
   	   ]);
   }


   protected function create(array $data){

	   	return User::create([
	            'name' => $data['name'],
	            'email' => $data['email'],
	            'password' => bcrypt($data['password']),
	            'phone' => $data['phone'],
	            'department' => $data['department'],
	        ]);
   }
   
   public function logout(){
        Auth::guard('lec')->logout();
        return redirect()->intended($this->redirectTo);;
    }

}
