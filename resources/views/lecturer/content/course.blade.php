@extends('lecturer.ext.main')

@section('topnav')
   
   @parent

@endsection

@section('sidenav')
   
   @parent

@endsection

@section('content')
!-- MAIN -->
<div class="main">
      <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
          
            <div class="panel">
              <div class="panel-heading">{{$course->name }}
                <p>{{ $course->description}}</p></div>
            </div>
           <div class="row">
             <div class="col-md-8">
               <div class="panel">
                 <div class="panel-heading">Classes</div>
                 <div class="panel-body">
                  @php 
                     $levels = $course->levels()->get();
                  @endphp
                  <ul class="list-unstyled activity-list">
                    @foreach($levels as $level)
                    <li><a href="{{route('attach.view',['id'=>$level->id])}}" >{{$course->name}} {{$level->year}}.{{$level->sem}}</a></li>
                    @endforeach
                  </ul>
                  
                 </div>
               </div>
             </div>

             <div class="col-md-4">
               <div class="panel">
                 <div class="panel-heading">Add a class</div>
                 <div class="panel-body">
                   <form id="levelform" action="{{route('add.level',['id'=>$course->id])}}" method="post">
                    {{csrf_field()}}
                     <select class="form-control input-lg" name="year">
                      <option value="">Year</option>
                      <option value="1">First</option>
                      <option value="2">Second</option>
                      <option value="3">Third</option>
                      <option value="4">Fourth</option>
                    </select>
                    <select class="form-control input-lg" name="semister">
                      <option value="">Semister</option>
                      <option value="1">Sem One</option>
                      <option value="2">Sem two</option>
                    </select>
                    <br>
                    <button onclick="event.preventDefault();
                    document.getElementById('levelform').submit();
                    " type="button" class="btn btn-primary">Add</button>
                   </form>
                 </div>
               </div>
             </div>

           </div>
        </div>
    </div>
</div>


			
@endsection