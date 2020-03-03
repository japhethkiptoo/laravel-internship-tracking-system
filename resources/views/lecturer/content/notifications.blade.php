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
        	@php 
        	    $notifications = Auth::guard('lec')->user()->notifications;
        	 @endphp
        	<div class="page-title">Notifications</div>
        	<div class="panel">
        		<div class="panel-body">
        			@if($notifications->count() < 1)
			        	<h4>No Notifications</h4>
			        @endif
        			<ul class="list-unstyled activity-list">
        				@foreach($notifications as $n)
	        			<li> @if($n->read_at == null)
	        				<span class="badge bg-warning">new</span>
	        				@endif
	        				<a href="{{($n->read_at==null)?route('notification.read',['id'=>$n->id]):'#'}}" 
	        				style="color:{{($n->read_at == null)?'#13a89e':'#000'}} !important;">
	        					<p>{{$n->data['message']}} from {{$n->data['student']['fname'].' '.$n->data['student']['lname']}}</p>
	        					<p>{{$n->created_at->format('l,d,M,y,H:m:s')}}</p>
	        				</a>
	        			</li>
	        			@endforeach
        			</ul>
        			
        		</div>
        	</div>
        </div>
     </div>
 </div>
@endsection