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
        	<h3 class="page-title">Tasks</h3>
        	<div class="row">
        		<div class="col-md-6">
        			<div class="panel">
        				<div class="panel-heading">
        					Task Form
        				</div>
        				<div class="panel-body">
        					@if($errors->has('work'))
							<div class="alert alert-danger alert-dismissible" role="alert">
								<i class="fa fa-times-circle"></i> 
								{{$errors->first('work')}}
							</div>
							@endif
        					<form action="{{ route('field.store')}}" method="POST">
        						{{csrf_field()}}
        						<input type="hidden" name="week" value="{{$week}}">
        						<textarea class="form-control" name="work" placeholder="Daily Task" rows="5" style="resize: none;">
        						{{Old('work')}}
        					    </textarea>
        						<br>
        						<button type="submit" class="btn btn-primary">Save Task</button>
        					</form>
        				</div>
        			</div>

        			<div class="panel">
        				<div class="panel-heading">
        					Task Progress
        				</div>
        				<div class="panel-body">
        					<div class="progress progress-xs">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
											<span class="sr-only">80% Complete</span>
										</div>
							</div>
							<div class="progress progress-xs">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
											<span class="sr-only">80% Complete</span>
										</div>
							</div>
							<div class="progress progress-xs">
										<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
											<span class="sr-only">80% Complete</span>
										</div>
							</div>
        				</div>
        			</div>
        		</div>

        		<div class="col-md-6">
        			<div class="panel">
        				<div class="panel-heading">Week {{$week}} tasks</div>
	        			<div class="panel-body">
	        				<ul class="list-unstyled activity-list">
	        					@foreach($tasks as $task)
								<li>
									<div class="text-primary">
										{{$task->created_at->format('l,d,M,y')}}
									</div>
									<p>{{$task->work}}</p>
                                    <div class="task-action-btns">
                                        <span onclick="openEditModal({{$task->id}})"><i class="fa fa-edit"></i> edit</span>
                                        | <span onclick="alert('details')"><i class="fa fa-info"></i> Details</span>
                                    </div>
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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edittaskform" method="post" action="{{route('edit.task')}}">
            {{csrf_field()}}
            <input id="taskId" type="hidden" name="task_id">
          <div class="form-group">
            <label for="message-text" class="form-control-label">Task</label>
            <textarea rows="5" cols="4" class="form-control" id="message-text" name="work"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="edittaskbtn" type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
