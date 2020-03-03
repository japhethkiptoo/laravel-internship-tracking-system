
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
         <div class="row">
         	<div class="col-md-6">
         		<div class="panel">
         			<div class="panel-heading">Student</div>
         		    <div class="panel-body">
                  <h3>{{$student->fname .' '.$student->lname }}</h3>
                  <p>{{$student->email}}</p>
                  <p>{{$student->course()->first()->name}}</p>
         		    </div>
         		</div>
         	</div>

          <div class="col-md-6">
            <div class="panel">
              <div class="panel-heading">Info</div>
                <div class="panel-body">
                  <div>
                    Lecturer : {{$lecturer->name}}, {{$lecturer->email}}<br>
                    week number : {{($week== null)?'0':$week}}<br>
                    Tasks Count : {{$tasks->count()}}<br>
                    Start :{{Carbon\carbon::parse($dates->start)}}<br>
                    End : {{Carbon\carbon::parse($dates->start)->addMonths($dates->duration)}}
                  </div>
                </div>
            </div>
          </div>

         </div>

         <div class="row">
           <div class="col-md-12">

            <div class="panel">
              <div class="panel-heading">Tasks </div>
              <div class="panel-body">
                @php $grouped = $tasks->groupBy('week'); @endphp 
                <ul class="activity-list list-unstyled ">
                  @foreach($grouped as $name => $tasks)
                  <li>
                    
                    <h3>Week {{$name}}
                      <span class="btn btn-bar btn-primary" >
                      <a href="{{route('confirm.week',['week'=>$name,'student'=>$student->id])}}" 
                        style="color:#fff!important">Confirm Week {{$name}}</a>
                      </span>
                    </h3>
                    <ul class="activity-list list-unstyled ">
                      @foreach($tasks as $task)
                      <li>
                        <p>{{$task->work}}</p>
                        <p>{{$task->created_at->format('l,d,M,y')}}</p>
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