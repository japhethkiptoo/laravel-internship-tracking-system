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
              <div class="panel-heading">Lecturers</div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="panel">
                  <div class="panel-body">
                    <ul class="list-unstyled activity-list">
                      @foreach($lecs as $lec)
                      <li>
                        <a href="{{ route('lecturer',['id'=>$lec->id])}}">
                        <h3>{{$lec->user->fname}} {{ $lec->user->lname }}</h3>
                        <p>{{$lec->user->email}} | {{ $lec->user->phone ?: 'No Phone'}} {{($lec->isHod)?'| HOD':''}}</p>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="panel">
                  <div class="panel-heading">Add Lecturer</div>
                  <div class="panel-body">
                    <form action="{{route('add.lecturer')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                          <label for="email">Email Address</label>
                          <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input class="form-control" type="number" name="phone">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Lecturer</button>
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