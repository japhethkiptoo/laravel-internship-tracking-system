<?php

namespace Entern\Http\Controllers;

use Illuminate\Http\Request;
use Entern\Course as C;
use Auth;
use Entern\Lecturer;
use Entern\SemYear as Level;
use Entern\Attachment;
use Entern\Department;

class CourseController extends Controller
{
    
    public function __construct(){
    
        $this->middleware('auth:lec');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $u = Auth::guard('lec')->user();

        $d = Department::with('courses','school')->findOrFail($u->department);

        $courses = $d->courses()->get();
        $schl = $d->school()->first();

        return view('lecturer.content.courses',['school'=>$schl,
            'dept'=>$d,
            'courses'=>$courses]);
    }

    public function getLevels($id){
        $levels = Level::isAvailable()->where('course_id',$id)->get();
        
        return response()->json([
            'status' =>'success',
            'levels' => $levels,
        ],200);
    }

    public function getAllLevels($id){
        $levels = Level::where('course_id',$id)->get();
        
        return response()->json([
            'status' =>'success',
            'levels' => $levels,
        ],200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name'=>'required|unique:courses',
            'description'=>'required'
        ]);
        $department = Auth::user()->department()->first();
        $c = new C();
        $c->name = $request->get('name');
        $c->description = $request->get('description');
        $department->courses()->save($c);
        return redirect()->back()->with([
            'status'=>'success',
            'message'=>'Course added!'

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = C::findOrFail($id);

        return view('lecturer.content.course',['course'=>$c]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c = C::findOrFail($id);

        return $c;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //validate

        $department = Auth::user()->department()->first();

        $c = C::findOrFail($id);
        $c->name = $request->get('name');
        $c->description = $request->get('description');
        $c->department = $request->get('department');

        $c->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = C::findOrFail($id);
        $c->destroy();
    }

    public function addClass(Request $request, $id){

        $this->validate($request, [
            'semister' => 'required',
            'year' => 'required',
        ]);
        $course = C::findOrFail($id);

        $class = new Level();
        $class->sem = $request->get('semister');
        $class->year = $request->get('year');
        $course->levels()->save($class);

        return redirect()->back()->with([
            'status'=>'success',
            'message'=>'Class Added'
        ]);
        
    }

    public function attachForm($id){
        $class = Level::findOrFail($id);
        $course = C::findOrFail($class->course_id);
         return view('lecturer.content.attach',
            ['level'=>$class,
          'course'=>$course]);
    }

    public function attach(Request $req,$id){

        $this->validate($req, [
            'start' => 'required',
            'duration' => 'required',
        ]);
        $class = Level::findOrFail($id);
        $attachment = new Attachment();
        $attachment->start = $req->get('start');
        $attachment->duration = $req->get('duration');
        $class->attachment()->save($attachment);

        return redirect()->back()->with([
            'status'=>'success',
            'message'=>'Attachment Set'
        ]);
    }
}
