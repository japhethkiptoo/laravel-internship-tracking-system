<?php

namespace Entern\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Entern\Student;
use Entern\User;

class StudentController extends Controller
{
    
    public function __construct(){
    	$this->middleware('auth');
    }

    public function students(){
    	$courses = Auth::user()->lec_details->department()->first()->courses()->get()->pluck('id');
    	$ids = collect([0]);
    	foreach ($courses as $c) {
    		$ids->prepend($c);
    	}
       $students = User::find($ids);
       return view('lecturer.content.students',['students'=>$students]);
    }


    public function newStudent(Request $request){

        $request->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:users',
            'regno'=>'required|unique:students',
            'idno'=>'required|unique:users',
            'course'=>'required',
             'level'=>'required'

        ]);

        $student = new Student();
        $student->course = $request->course;
        $student->level_id = $request->level;
        $student->regno = $request->regno;
        $student->sex = $request->sex;

        $s = new User();
        $s->fname = $request->fname;
        $s->lname = $request->lname;
        $s->idno = $request->idno;
        $s->email = $request->email;
        $s->phone = ($request->phone == null)?0:$request->phone;
        $s->password = bcrypt('password'); 
        
        $s->save();
        $s->student_details()->save($student);

        return redirect()->route('students')->with(['status'=>'success','message'=>'Student added!']);

    }
}
