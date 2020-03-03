<?php

namespace Entern\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Auth;
use Entern\Supervisor as Sup;
use Entern\FieldWork as Task;
use Entern\Week;
use Entern\Student;
use Entern\Notifications\WeekConfirmation;
use Entern\Notifications\Assessment as AssessmentNotification;
use Entern\Assessment;

class BaseController extends Controller
{
    

    public function __construct(){
    	$this->middleware('auth:sup');
    }

    public function index(){

    	//dd(Auth::user()->students()->first()->level()->first()->assigned);

    	$sup = Auth::user()->with('students','firm')->first();
        
    	return view('supervisor.base',['sup'=>$sup]);
    }

    public function myStudents(){

    	$students = Auth::user()->students()->OrderBy('updated_at','desc')->get();

    	return view('supervisor.students',['students'=> $students]);
    }


    public function student($id){
    	$student = Auth::user()->students()->where('id',$id)->first();

    	$lecturer = $student->level()->first()->assigned()->first()->lec;
    	
    	$tasks = Task::where('student_id',$student->id)->OrderBy('created_at','desc')->get();
    	$week = Task::where('student_id',$student->id)->latest()->pluck('week')->first();

    	$dates = $student->level()->first()->attachment()->first();

    	return view('supervisor.student',['student'=> $student,
    		'lecturer'=> $lecturer,'tasks'=> $tasks,'week'=> $week,'dates'=>$dates]);
    }


    public function confirmWeek($week_no,$student){
      
        $student = Student::find($student);
        $week = Week::where('week',$week_no)->where('student_id',$student->id)->first();
        
        if($week != null){
            $week->week = $week_no;
        }else{
            $week = new Week();
            $week->week = $week_no;
            $student->weeks()->save($week);
        }

        $message = 'Week '.$week_no.' Confirmed';
        $lec = $student->level()->first()->assigned()->first()->lec;
        
        $lec->notify(new WeekConfirmation($student,$week,$message));
        return redirect()->back()->with(['status'=>'success','message'=>'Tasks confirmed!']);


    }


    public function assessmentform($id){
      
      $student = Student::find($id);
      $assessment = $student->supervisor()->first()
                            ->assessment()
                            ->where('student_id',$student->id)
                            ->first();
      return view('supervisor.assessmentform',['student'=>$student,'assessment'=>$assessment]);
    }

    public function assessment(Request $request,$id){
         $student = Student::find($id);
         $data = [
            'punctuality'=>$request->punctuality,
            'adherence'=>$request->adherence,
            'workmanship'=>$request->workmanship,
            'workoutput'=>$request->workoutput,
            'adaptability'=>$request->adaptability,
            'communication'=>$request->communication,
            'reliability'=>$request->reliability,
            'teamwork'=>$request->teamwork,
            'overall'=>$request->overall,
         ];
         $comment = $request->get('remarks');
         $level = $student->level()->first();
         $attachment = $level->attachment()->OrderBy('created_at','desc')->first();
         $lec = $level->assigned()->first()->lec()->first();

         $assess = $student->supervisor()->first()
                            ->assessment()
                            ->where('student_id',$student->id)
                            ->first();

         if($assess != null){
            $assess->comment = $comment;
            $assess->data = serialize($data);
            $assess->save();

            //notify
            $lec->notify(new AssessmentNotification($student,'Student Assessment Update'));
         }else{
            $assess = new Assessment();
            $assess->student_id = $student->id;
            $assess->comment = $comment;
            $assess->attachment_id = $attachment->id;
            $assess->data = serialize($data);
            Auth::user()->assessment()->save($assess);

            //notify
            $lec->notify(new AssessmentNotification($student,'Student Assessment Notification'));
         }

         return redirect()->back()->with(['status'=> 'success',
            'message'=>'Assessment saved!'
         ]);
         
    }
}
