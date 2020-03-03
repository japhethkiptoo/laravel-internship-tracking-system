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
              <div class="panel-heading">My Students</div>
              <div class="panel-body">
              @if($single)
                 <ul class="list-unstyled activity-list">
                 	@foreach($students as $student)
                 	<li>
                 		<h3>{{$student->fname}} {{$student->lname}}</h3>
                 		Tasks: {{$student->field()->count()}} | New Tasks
                 		<br><br>
                 		<div class="btns-group">
                 			<div class="btn btn-primary"><a href="{{ route('student',['id'=>$student->id])}}" style="color:#fff !important;">View Tasks</a></div>
                      <div class="btn btn-primary"><a href="{{ route('student.assessment',['id'=>$student->id])}}" style="color:#fff !important;">Assessment</a></div>
                 		</div>
                 	</li>
                 	@endforeach
                 </ul>
              @endif
              @if(!$single)
                 <table class="table">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>Registration No.</th>
                       <th>Phone No.</th>
                       <th>Email Address</th>
                       <th>Course/level</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($students as $student)
                     <tr>
                       <td>{{$student->fname.' '.$student->lname}}</td>
                       <td>{{$student->regno}}</td>
                       <td>{{$student->phone}}</td>
                       <td>{{$student->email}}</td>
                       <td>{{$student->course()->first()->name}} {{$student->level()->first()->year}}.{{$student->level()->first()->sem}}</td>
                       <td>
                         <div class="btns-group">
                      <div class="btn btn-primary"><a href="{{ route('student',['id'=>$student->id])}}" style="color:#fff !important;">View Tasks</a></div>
                      <div class="btn btn-primary"><a href="{{ route('student.assessment',['id'=>$student->id])}}" style="color:#fff !important;">Assessment</a></div>
                    </div>
                       </td>
                     </tr>
                     @endforeach
                   </tbody>
                 </table>
              @endif
          </div>
            </div>
        </div>
    </div>
</div>
@endsection