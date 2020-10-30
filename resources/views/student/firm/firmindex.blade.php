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
        	<h3 class="page-title">My Firm</h3>
			@if($firm)
        	<div class="row">
        		<div class="col-md-6">
        			<div class="panel">
        				<div class="panel-heading">Organization</div>
        				<div class="panel-body">
        				  <h1>{{$firm->firm}}</h1>
        				  <h4>
        				  	Address: {{$firm->address}}, {{$firm->site}}
        				  </h4>
        				  <h4>
        				  	Tel: {{$firm->tel}}
        				  </h4>
        				  <h4>
        				  	Fax: {{$firm->fax}}
        				  </h4>
        			    </div>
        			</div>
        			
        		</div>

        		<div class="col-md-6">
        			<div class="panel">
        				<div class="panel-heading">Supervisor</div>
        				<div class="panel-body">
        					@php $sup = $firm->supervisor()->first(); @endphp
        				  <h1>{{$sup->name}}</h1>
        				  <h4>Email: {{$sup->email}}</h4>
        				  <h4>Tel: {{$sup->phone}}</h4>
        			    </div>
        			</div>
        			
        		</div>
        	</div>
			@else 
			<div>
				<p>{{ 'Please set your attached firm!'}}</p>
			</div>
			@endif
        </div>
     </div>
 </div>
@endsection