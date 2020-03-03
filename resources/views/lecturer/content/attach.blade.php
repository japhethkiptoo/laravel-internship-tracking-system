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
              <div class="panel-heading">{{$course->name}} {{$level->year}}.{{$level->sem}}</div>
            </div>
           <div class="row">
            <div class="col-md-6">
              <div class="panel">
                <div class="panel-heading">Attachments</div>
                <div class="panel-body">
                  @php 
                    $attaches = $level->attachment()->get();
                    $i = 0; 
                  @endphp

                  <ul class="list-unstyled activity-list">
                    @foreach($attaches as $attach)
                    @php $i +=1 @endphp
                      <li>
                        {{$i}}
                        <p>Start at: {{$attach->start}}</p>
                        <p>Duration: {{$attach->duration}}</p>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

             <div class="col-md-6">
               <div class="panel">
                 <div class="panel-heading">Schedule an attachment</div>
                 <div class="panel-body">
                   <form id="attachform" action="{{route('attach',['id'=>$level->id])}}" method="POST">
                    {{csrf_field()}}
                    <label>Start Date</label><br>
                    <input type="date" class="form-control" name="start">
                    <label>Duration</label><br>
                    <input type="number" class="form-control" name="duration" min="1">
                    <br>
                    <button onclick="event.preventDefault();
                    document.getElementById('attachform').submit();
                    " type="button" class="btn btn-primary">Save</button>
                   </form>
                 </div>
               </div>
             </div>

           </div>
        </div>
    </div>
</div>


			
@endsection