<?php

namespace Entern\Http\Controllers\Auth;

use Entern\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

Class StudentResetPasswordController extends Controller{

	use ResetsPasswords;

	//redirect to

	protected $redirectTo = '/home';


	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showResetForm(Request $req){

     return view('auth.passwords.student-reset')->with(
            ['email' => Auth::user()->email]
        );
    }

    public function postreset(Request $request)
    {
       $this->validate($request, $this->rules(), $this->validationErrorMessages());

       $credentials = $request->only('email','password','password_confirmation');

       $user = Auth::user();

       $user->password = bcrypt($credentials['password']);

       $user->save();
       return redirect()->route('home')
                        ->with('success',$user->fname.' Your new password :'.$credentials['password']);
    }

    protected function rules(){
    	return [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

}