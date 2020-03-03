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
              <div class="panel-heading">
              	<h3>{{$student->fname.' '.$student->lname}}</h3>
              	<p>{{$student->course()->first()->name}} | {{$student->level()->first()->year}}.{{$student->level()->first()->sem}}</p>
              </div>
              <div class="panel-body">
              	@php 
              	    $tasks = $student->field()->OrderBy('created_at','asec')->get();
                    $grouped = $tasks->groupBy('week');
              	 @endphp
              	 <ul class="list-unstyled">
              	 	@foreach($grouped as $name=>$tasks)
              	 	<li>
              	 		<h3 style="border-bottom: 2px solid #333;">Week {{$name}}</h3>
              	 		<ul class="list-unstyled activity-list">
		              		@foreach($tasks as $task)
		              		<li>
		              			<div class="text-primary">
								    {{$task->created_at->format('l,d,M,y')}}
								</div>
							    <p>{{$task->work}}</p>
		              		</li>
		              		@endforeach
		              	</ul>
              	 	</li>
              	 	@endforeach
              	 </ul>
              	
              </div>
          </div>
      </div>
  </div>
</div>
@endsection