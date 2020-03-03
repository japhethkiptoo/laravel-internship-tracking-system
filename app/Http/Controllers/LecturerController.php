<?php

namespace Entern\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Entern\lecturer;
use Entern\Assigned;
use Entern\SemYear as Level;
use Entern\Student;

class LecturerController extends Controller
{   
	
    public function __construct(){
        $this->middleware('auth:lec');
    }

    public function index(){
        $u  = Auth::user();
        $d = $u->department()->first();
        $lecs = $d->lecturers()->get();

       return view('lecturer.content.lecturers',['lecs'=>$lecs]);
    }

    public function lecturer($id){
    	$lec = lecturer::findOrFail($id);
    	$department = $lec->department()->first();
    	$courses = $department->courses()->with('levels')->get();
        $assigned = $lec->assigned()->with('level')->get();

        return view('lecturer.content.lecturer',['lec'=>$lec,
        	'courses'=>$courses,'assigned'=>$assigned]);
    }

    public function addLecturer(Request $req){
       $req->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:supervisors',
            'phone'=>''
       ]);

       $department = Auth::user()->department()->first();

       $lec = new Lecturer();
       $lec->name = $req->name;
       $lec->email = $req->email;
       $lec->phone = $req->phone;
       $lec->password = bcrypt('123456');
       $department->lecturers()->save($lec);

       return redirect()->back()->with([
             'status'=>'success',
             'message'=>'Added lecturer'
       ]);
    }

    public function assigned(){
    	$lec = Auth::user();
    	$assigned = $lec->assigned()->orderBy('created_at','desc')->get();
    	return view('lecturer.content.myassigned',['assigned'=>$assigned]);
    }

    public function assignLec(Request $request,$lec){

    	$this->validate($request, [
            'level' => 'required',
        ]);

        $lec = lecturer::findOrFail($lec);
        $level_id = $request->get('level');
        $level = Level::findOrFail($level_id);
        $assigned = new Assigned([
        	'level'=>$level->id
        ]);
        $lec->assigned()->save($assigned);
        return redirect()->back()->with([
        	'status'=>'success',
        	'message'=>'Assigned!'
             
        ]);
    }

    public function myStudents($level = 0){
        $single = false;
        $students =[];
        $assigned = [];
        if($level != 0){
            $single = true;
            $level = Level::find($level);
            $students = $level->student()->get();
        }else{
            $student = collect([]);
            $assigned = Lecturer::find(Auth::id())->assigned()->get()->pluck('level');
            $collection = collect([]);
            foreach($assigned->toArray() as $a){
                 $thestudents = Level::find($a)->student()->get();
                 $students = $collection->prepend($thestudents)->collapse();
            }
        }

        $data = [
            'single'=>$single,
            'students'=>$students,
            'assigned'=>$assigned
        ];
        return view('lecturer.content.mystudents',$data);
    }

    public function student($id){
       return view('lecturer.content.task',[
             'student'=> Student::find($id)
       ]);
    }

     public function studentAssessment($id){
       return view('lecturer.content.assessment',[
             'student'=> Student::find($id)
       ]);
    }


    public function notifications(){
        return view('lecturer.content.notifications');
    }

    public function readNotification($id){
      $notis  = Auth::guard('lec')->user()->unReadNotifications()->find($id);

      if($notis->type == 'Entern\Notifications\Assessment'){
        $notis->markAsRead();
        return redirect()->route('student.assessment',['id'=>$notis->data['student']['id']]);
      }elseif ($notis->type == 'Entern\Notifications\WeekConfirmation' ) {
        $notis->markAsRead();
       return redirect()->route('student',['id'=>$notis->data['student']['id']]);
      }    
      
    }
}
