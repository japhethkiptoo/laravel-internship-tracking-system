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
        	<div class="page-title">Students</div>
        	<div class="panel">
                <div class="panel-heading">
                    <a href="{{route('add.student')}}" type="button" class="btn btn-primary right">Add Student</a>
                </div>
        		<div class="panel-body">
                    <table class="table table-striped table-bordered table-hover dataTables-orders" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$student->fname}} {{$student->lname}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{($student->student_details) ? $student->student_details->course()->first()->name : 'n/a'}} 
                                {{ ($student->student_details) ? $student->student_details->level()->first()->year : 'n/a'}}.
                                {{ ($student->student_details) ? $student->level()->first()->sem : 'n/a'}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        			
        		</div>
        	</div>
        </div>
    </div>
</div>


@endsection

@section('scripting')
<script>
    
     $(document).ready(function(){
            $('.dataTables-orders').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Event Planning Orders'},
                    {extend: 'pdf', title: 'Event Planning Orders'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
</script>
@endsection