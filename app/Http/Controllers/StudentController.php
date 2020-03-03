<?php

namespace Entern\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Entern\Student;

class StudentController extends Controller
{
    
    public function __construct(){
    	$this->middleware('auth:lec');
    }

    public function students(){
    	$courses = Auth::user()->department()->first()->courses()->get()->pluck('id');
    	$ids = collect([0]);
    	foreach ($courses as $c) {
    		$ids->prepend($c);
    	}
       $students = Student::find($ids);
       return view('lecturer.content.students',['students'=>$students]);
    }


    public function newStudent(Request $request){

        $request->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:students',
            'regno'=>'required|unique:students',
            'idno'=>'required|unique:students',
            'course'=>'required',
             'level'=>'required'

        ]);

        $s = new Student();
        $s->fname = $request->fname;
        $s->lname = $request->lname;
        $s->email = $request->email;
        $s->course = $request->course;
        $s->level_id = $request->level;
        $s->idno = $request->idno;
        $s->regno = $request->regno;
        $s->sex = $request->sex;
        $s->phone = ($request->phone == null)?0:$request->phone;
        $s->password = bcrypt($request->idno); 
        
        $s->save();

        return redirect()->route('students')->with(['status'=>'success','message'=>'Student added!']);

    }
}
