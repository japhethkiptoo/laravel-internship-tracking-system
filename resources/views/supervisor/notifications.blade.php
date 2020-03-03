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
        	<div class="panel">
        		<div class="panel-body">
        			@if(!$single)
        			<ul class="activity-list list-unstyled">
        				@foreach($notifications as $n)
        				<li><a href="{{route('sup.one.notifications',['id'=>$n->id])}}"><p>{{$n->data['message']}}</p>
        					{{$n->data['student']['fname']}}{{$n->data['student']['lname']}}
        				</a></li>
        				@endforeach
        			</ul>
        			@endif

        			@if($single)
        			<ul class="activity-list list-unstyled">
        				<li>
        					<h3>{{$notifications->data['message']}}</h3>
        					{{$notifications->data['student']['fname']}}
        					{{$notifications->data['student']['lname']}}
        				</li>
        			</ul>
        			@endif
        		</div>
        	</div>
        </div>
    </div>
</div>

@endsection