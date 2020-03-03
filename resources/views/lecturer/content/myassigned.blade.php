@extends('lecturer.ext.main')

@section('topnav')
   
   @parent

@endsection

@section('sidenav')
   
   @parent

@endsection

@section('content')
<div class="main">
      <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
              <div class="panel-heading">My Courses</div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  @foreach($assigned as $task)
                          @php 
                          $level = $task->level()->with('course','attachment')->first();
                          $students = $level->student()->count();
                          
                          @endphp
                  <div class="col-md-4">
                    <div class="panel">
                      <div class="panel-heading">
                        <h3>{{$level->course->name}} {{$level->year}}.{{$level->sem}}</h3>
                      </div>
                      <div class="panel-body">
                        <a href="{{route('mystudents',['level'=>$level->id])}}">
                            
                            <p>Start :{{$level->attachment()->first()->start}} </p>
                            <p>Duration: {{$level->attachment()->first()->duration}}</p>
                            <p>Students No: {{$students}}</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div> 
              </div>
            </div>
        </div>
    </div>
</div>


			
@endsection