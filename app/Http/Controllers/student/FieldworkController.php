<?php

namespace Entern\Http\Controllers\student;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Entern\Fieldwork as Field;
use Auth;
use Carbon\carbon;
use Entern\Notifications\NewTask;

class FieldworkController extends Controller
{
   function __construct(){ 

      $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

       $field = Field::all();
       $attachment = Auth::user()->student_details->level()->first()->attachment()->first();
       $start = carbon::parse($attachment->start);
       $today = carbon::now();
       $week = $this->week($start,$today);

       $weektasks = Auth::user()->student_details->field()->where('week',$week)->get();

       return view('student.field.field',['field'=>$field,
                                        'tasks'=>$weektasks,
                                        'week'=>$week]);
    }

    public function week($start,$today){
       $w = 0;
       $days = $start->diffInDays($today);
       $w = round($days/7,0);
       $w = ($w == 0)? 1 :$w;
       return $w;
    }

    public function allTasks(){
      return view('student.field.all',['tasks'=>Auth::user()->student_details->field()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       $this->validate($request,Field::rules());
       
         $field = new Field();
         $field->week = $request->get('week');
         $field->day = carbon::now();
         $field->work = $request->get('work');
         $field->comment = '';

         $student = Auth::user()->student_details;
         $student->field()->save($field);

         //notify sup
         // $sup = Auth::user()->student_details->supervisor()->first();
         // $sup->notify(new NewTask($student,'New Task'));

         return redirect()->back()->with(['status'=>'success',
          'message'=>'Task saved!']);
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $field = Field::findOrfail($id);
        return response()->json([
          'task' => $field
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
       $this->validate($request,Field::rules());
       $id = $request->get('task_id');
       $field = Field::findOrfail($id);
       $field->work = $request->get('work');
       $field->save();

        return redirect()->back()->with(['status'=>'success',
          'message'=>'Task Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $field = Field::findOrfail($id);
        $field->delete();
    }
}
