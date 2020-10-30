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
              	<h3>{{$user->fname.' '.$user->lname}}</h3>
              	<p>{{$student->course()->first()->name}} | {{$student->level()->first()->year}}.{{$student->level()->first()->sem}}</p>
              </div>
              <div class="panel-body">
              	@php 
              	    $assessment = $student->assessment()->OrderBy('created_at','asec')->get();
              	 @endphp
				   @if($assessment !== null)
              	 <ul class="list-unstyled">
              	 	@foreach($assessment as $assess)
                        <li>
                        	<ul class="list-unstyled">
                        		<li>Punctuality: {{$assess->data['punctuality']}}/5</li>
                        		<li>Adherence: {{$assess->data['adherence']}}/5</li>
                        		<li>Workmanship: {{$assess->data['workmanship']}}/5</li>
                        		<li>Workoutput: {{$assess->data['workoutput']}}/5</li>
                        		<li>Adaptability: {{$assess->data['adaptability']}}/5</li>
                        		<li>Communication: {{$assess->data['communication']}}/5</li>
                        		<li>Reliability: {{$assess->data['reliability']}}/5</li>
                        		<li>Teamwork: {{$assess->data['teamwork']}}/5</li>
                        		<li>Overally: {{$assess->data['overall']}}/5</li>
                        		<li><h3>Comment: </h3><p>{{$assess->comment}}</p></li>
                        	</ul>
                        </li>
              	 	@endforeach
              	 </ul>
				   @else 
				   <p>No assessment yet!</p>
				   @endif
              	
              </div>
          </div>
      </div>
  </div>
</div>
@endsection