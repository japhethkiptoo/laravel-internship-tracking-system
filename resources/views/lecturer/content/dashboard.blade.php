
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
            <h3 class="page-title">Dashboard</h3>
            {{Auth::user()->is_hod()}}
            <h3>{{($lec->isHod)?'HOD':'Lecturer' }} Dashboard</h3>
        </div>
    </div>
</div>


			
@endsection