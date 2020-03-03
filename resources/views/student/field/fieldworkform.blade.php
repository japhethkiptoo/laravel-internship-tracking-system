@php

$user = Auth::user();

$course = $user->course()->first();
$attachment = $course->attach()->first();
$start = $attachment->start;
$start = Carbon\carbon::parse($start);
$date = new DateTime($start);
$week = weekNo($start,Carbon\carbon::now());

function weekNo( $start, $today){
 $w = 0;
 $days = $start->diffInDays($today);
 $w = round($days/7,0);
 $w = ($w == 0)? 1 :$w;
 return $w;
}

$fw = $user->field()->where('week',$week)->get();

@endphp

<div>
	<form action="{{route('field.store')}}" method="POST" >
			{{csrf_field()}}
		<h4>Week {{$week}} | {{ Carbon\carbon::now()}}</h4>
		<input type="hidden" name="week" value="{{$week}}">
		<input type="hidden" name="date" value="{{ Carbon\carbon::now() }}">
		<div class="form-group {{(!$errors->has('work'))?'':'text-danger'}}">
			@if($errors->has('work'))
    		<small class="form-text">{{ $errors->first('work')}}</small>
    		@endif
			<textarea style="resize:none;" 
			class="form-control" 
			name="work" rows="7" placeholder="Your Task">{{Old('work')}}
		    </textarea>
		</div>
		<button class="btn" type="submit">Submit Task</button>
	</form>
</div>

 <div class="row" style="margin-top: 20px;">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>Week {{$week}} Tasks</h3>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_calendar"></i> Date</th>
                    <th><i class="icon_pencil"></i> Task</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($fw as $task)
                  <tr>
                    <td>{{ $task->day}}</td>
                    <td><p>{{ $task->work }}</p></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="#" title="edit"><i class="icon_pencil"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </section>
          </div>
        </div>