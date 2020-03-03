@extends('supervisor.core.core')


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
         <h3 class="page-title">Supervisor Dashboard</h3>
         <div class="row">
         	<div class="col-md-12">
         		<div class="panel">
         			<div class="panel-heading">Student(s)</div>
         		    <div class="panel-body">
         			 @foreach($sup->students()->get() as $student)
                       <h4>{{$student->fname}} {{$student->lname}}</h4>
                       <h5>{{$student->email}}</h5>
                       <h5>{{$student->phone}}</h5>
                       <h5>{{($student->sex)?'Male':'Female'}}</h5>
                       <h5>{{$student->course()->first()->name}}</h5>
         			 @endforeach
         		    </div>
         		</div>
         	</div>

         </div>
        </div>
    </div>
</div>
@endsection