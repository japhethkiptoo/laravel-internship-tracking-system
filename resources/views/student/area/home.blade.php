@extends('student.main.student-body')

@section('topnav')
   
   @parent

@endsection

@section('sidenav')
   
   @parent

@endsection

@section('content')

<!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="container-fluid">
         <h3 class="page-title">Dashboard</h3>
         @if($student)
         <div class="row">
           <div class="col-md-6">
             <div class="panel">
               <div class="panel-heading">School</div>
               
               @php 
                    $course = $student->course()->with('department')->first();
                    $department = $course->department()->with('school')->first();
                    $school = $department->school()->first();
                @endphp
               <div class="panel-body bg-primary">
                <h4>{{$school->name}}</h4>
                <p>{{$school->description}}</p>
               </div>
             </div>
             <div class="panel">
               <div class="panel-heading">Year</div>
               <div class="panel-body">
                <h4>Year: {{$student->level()->first()->year}}</h4>
                <p>Semister: {{$student->level()->first()->sem}}</p>
               </div>
             </div>
           </div>

           <div class="col-md-6">
             <div class="panel">
               <div class="panel-heading">Course</div>
               <div class="panel-body">
                 <h4>{{$course->name}}</h4>
                 <p>{{$course->description}}</p>
                 <h4>{{$department->name}}</h4>
                 <p>{{$department->description}}</p>
               </div>
             </div>
           </div>
           @endif
         </div>
      </div>
    </div>

			
@endsection