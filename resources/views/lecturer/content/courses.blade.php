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
              <div class="panel-heading">{{ 'School of '.$school->name}}<br>
            {{ 'Department of '.$dept->name}}</div>
            </div>
           <div class="row">
            <div class="col-md-8">
              <div class="row">
            @foreach($courses as $course)
            <a href="{{ route('course',['id'=>$course->id])}}">
             <div class="col-md-6">
              <div class="panel">
                <div class="panel-heading">{{$course->name}}
                  <p>{{ $course->description}}</p>
                </div>
                <div class="panel-body">
                 {{$course->levels()->count()}} Classes
                </div>
              </div>
             </div>
           </a>
             @endforeach
           </div>
           </div>
           <div class="col-md-4">
             <div class="panel">
               <div class="panel-heading">Add Course</div>
               <div class="panel-body">{{$errors}}
                  <form action="{{route('add.course')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                          <label for="desc">Description</label>
                          <textarea class="form-control" rows="4" name="description"></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Course</button>
                        </div>
                    </form>
               </div>
             </div>
           </div>
           </div>
        </div>
    </div>
</div>


			
@endsection