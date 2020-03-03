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
        	<h3 class="page-title"> All Tasks</h3>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="panel">
	        			<div class="panel-body">
	        				<ul class="list-unstyled ">
	        					@foreach($tasks->groupBy('week') as  $key => $task)
								<li>
                  <h3 style="border-bottom: 2px solid #333;">Week {{$key}}</h3>
                  <ul class="list-unstyled activity-list">
                    @foreach($task as $t)
                    <li>
                      <div class="text-primary">
                        {{$t->created_at->format('l,d,M,y')}}
                      </div>
                      <p>{{$t->work}}</p>
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
    </div>
</div>
@endsection