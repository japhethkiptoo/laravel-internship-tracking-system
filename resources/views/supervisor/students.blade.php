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
         	<div class="col-md-12">
         		<div class="panel">
         			<div class="panel-heading">Student(s)</div>
         		    <div class="panel-body">
                  <ul class="list-unstyled">
                    @foreach($students as $student)
                    <li>
                      <a href="{{ route('sup.student',['id'=>$student->id])}}">
                        <div class="row">
                          <div class="col-md-6">
                            <h4>{{$student->fname}} {{$student->lname}}</h4>
                           <h5>{{$student->email}} {{$student->course()->first()->name}}</h5>
                          </div>
                          <div class="col-md-6">
                            info
                            <div class="btns-group">
                              <a href="{{route('sup.assessment',['id'=>$student->id])}}" class="btn btn-primary">Assessment</a>
                            </div>
                          </div>
                        </div>
                       
                     </a>
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