<?php

namespace Entern\Http\Controllers\Auth;

use Entern\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Carbon\carbon;
use Entern\Student;
use Auth;
use Illuminate\Validation\ValidationException;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
        $role = Auth::User()->role;
        switch ($role) {
            case 'student':
                return '/';
                break;

            case 'lecturer':
                return '/lecturer';
                break;

            default:
                return '/login';
                break;
        }
    }


    public function username() {
        $login = request()->input('identity');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'idno';
        request()->merge([$field => $login]);

        return $field;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('student.auth.student-login');
    }


    public function login(Request $request){
       
         $this->validateLogin($request);

         if($this->isOnAttachment($request)){
            
            if ($this->attemptLogin($request)) {

              Session::flash('message','Succesfully logged In');
              Session::flash('status','info');

               return $this->sendLoginResponse($request);
             }

            return $this->sendFailedLoginResponse($request);
           
         }

         return $this->sendNotAttachedResponse($request);

        
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            'identity.required' => 'Email or Id number cannot be empty',
            'email.exists' => 'Email or Id number already registered',
            'username.exists' => 'Username is already registered',
            'password.required' => 'Password cannot be empty',
        ];

        $request->validate([
            'identity' => 'required|string',
            'password' => 'required|string',
            'email' => 'string|exists:users',
            'username' => 'string|exists:users',
        ], $messages);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath())->with(['status'=>'success','msg','Successful Login!']);
    }

    protected function isOnAttachment(Request $request){
       return True ;
    }

    protected function sendNotAttachedResponse(Request $request)
    {
        throw ValidationException::withMessages([
            "attached" => "You are not scheduled for your Field work!",
        ]);
    }

    protected function attachedDates($start){
        $today = carbon::today();
        $diff  = carbon::parse($start)->diffInDays($today);

        if($diff > 1){
          return true;
        }

        return false;

    }

    protected function authenticated(Request $request, $user)
    {   $role = $user->role;
        switch ($role) {
            case 'student':
                return redirect()->route('home')->with(['status'=>'success','msg','Successful Login!']);
                break;

            case 'lecturer':
                return redirect()->route('lec.dashboard')->with(['status'=>'success','msg','Successful Login!']);
                break;

            default:
                return '/login';
                break;
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
