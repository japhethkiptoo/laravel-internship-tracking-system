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
        	<div class="page-title"> New Student</div>
        	<div class="panel">
                <div class="panel-heading">
                </div>
        		<div class="panel-body">
              {{$errors}}

              <form action="{{route('add.student')}}" method="post" accept-charset="utf-8">
                {{csrf_field()}}
                <div class="form-group">
                          <label for="name">First Name</label>
                          <input class="form-control" type="text" name="fname" value="{{old('fname')}}" required>
                </div>
                <div class="form-group">
                         <label for="name">Last Name</label>
                          <input class="form-control" type="text" name="lname" value="{{old('lname')}}" required>
                </div>
                <div class="form-group">
                          <label for="name">Registration No.</label>
                          <input class="form-control" type="text" name="regno" value="{{old('regno')}}" required>
                </div>
                <div class="form-group">
                          <label for="name">ID No</label>
                          <input class="form-control" type="text" name="idno" value="{{old('idno')}}" required>
                </div>
                <div class="form-group">
                          <label for="email">Email Address</label>
                          <input class="form-control" type="email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input class="form-control" type="number" name="phone" value="{{old('phone')}}">
                </div>
                @php $courses = Auth::guard('lec')->user()->department()->first()->courses()->get();
                  @endphp

                <div class="form-group">
                          <label for="name">Course</label>
                          <select id="courseselector" class="form-control" name="course" required onchange="displayLevels()">
                            <option>Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                          </select>
                </div>
                <script >
                        function displayLevels(){
                          var id = $('#courseselector').val();
                          var url = "{{ route('home')}}";
                         $.get(url+"/lecturer/course/levels/"+id+"/all",{},function(res){
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
                <div class="form-group">
                          <label for="name">Level</label>
                          <select id="levelselector" class="form-control" name="level" required disabled>
                            <option>Select Level</option>
                          </select>
                </div>

                <div class="form-group">
                          <label for="name">Sex</label>
                          <select class="form-control" name="sex" required>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                          </select>
                </div>
                <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection