<?php

namespace Entern\Http\Controllers\student;

use Illuminate\Http\Request;
use Entern\Http\Controllers\Controller;
use Entern\Firm;
use Entern\Supervisor;
use Auth;
use Entern\Student;
use Session;

class FirmController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firm = Firm::with('student')->first();
       
        return view('student.firm.firmindex')->with('firm',$firm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,Firm::rules());

       $firm = new Firm();
       $firm->firm = $request->get('firm');
       $firm->address = $request->get('address');
       $firm->tel = $request->get('tel');
       $firm->student_id = Auth::user()->id;
       //sup
       $email = $request->get('supervisor_email');
       $name = $request->get('supervisor_name');
       $sup = Supervisor::where('email',$email)->first();
       if($sup !== null){
        $sup->name = $name;
        $sup->save();
         //set supervisor
        
       }else{
        $sup = new Supervisor();
        $sup->name = $name;
        $sup->email = $email;
        $sup->phone = $request->get('tel');
        $sup->save();
       }
       $firm->supervisor = $sup->id;
        Auth::user()->student_details->firm()->save($firm);
        $student = Auth::user()->student_details;
        $student->supervisor = $sup->id;
        $student->save();

        

      
      
       return redirect()->route('home')->with(['status'=>'success','message'=>'You are ready for your Internship! Supervisor is Registered: email = '.$email.', password = password']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $firm = Firm::findorFail($id);
       
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
       $firm = Firm::findorFail($id);
       $firm->firm = $request->get('firm');
       $firm->address = $request->get('address');
       $firm->tel = $request->get('tel');
       $firm->supervisor = $request->get('supervisor');
       $firm->save();
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
