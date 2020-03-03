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
              <div class="panel-heading">{{$lec->name}}</div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="panel">
                  <div class="panel-heading">Assigned Courses</div>
                  <div class="panel-body">
                    <ul class="list-unstyled activity-list">
                      @foreach($assigned as $assignment)
                      <li>
                        <h3>{{$assignment->level()->first()->course()->first()->name}}   
                           {{$assignment->level()->first()->year}}.
                          {{$assignment->level()->first()->sem}}</h3>
                          @php
                            $attachment = $assignment->level()->first()->attachment()->first();
                          @endphp
                          <p>Start :{{\Carbon\carbon::parse($attachment->start)->format('l,d,M,y')}}</p>
                          <p>Duration: {{$attachment->duration}}</p>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="panel">
                  <div class="panel-heading">Assign Course</div>
                  {{$errors}}
                  <div class="panel-body">
                    <form id="assingform" action="{{route('assign.lec',['id'=>$lec->id])}}" method="POST" >
                      {{csrf_field()}}
                      <select id="courseselector"  name="course" class="form-control" onchange="selectCourse()">
                        <option value="">Select a Course</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{$course->name}}</option>
                        @endforeach
                      </select>
                      <script >
                        function selectCourse(){
                          var id = $('#courseselector').val();
                          var url = "{{ route('home')}}";
                         $.get(url+"/lecturer/course/levels/"+id,{},function(res){
                             var select = $('#levelselector');
                             select.prop('disabled',false);
                             var newOptions = res.levels;
                             select.find('option:not(:first)').remove();
                             $.each(newOptions, function(key,data){
                                select.append($("<option/>",{
                                  value:data.id,
                                  text:data.year+'.'+data.sem
                                }));
                             });
                         });
                        }
                      </script>
                      <br>
                      <select id="levelselector" name="level" class="form-control" disabled>
                       <option value="">Select class</option>
                      </select>
                      <br>
                      <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


			
@endsection