@extends('supervisor.core.core')


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
        	@php $yea =($assessment != null)?true:'false';  @endphp
        	<h1 class="page-title"> Assessment Form</h1>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="panel">
        				<div class="panel-heading">Please, give your assessment of <b>{{$student->fname.'`s'}}</b> performance during the period of attachment on the 5 point scale below.</div>
        				<div class="panel-body">
        					<form action="{{route('sup.assessment',['id'=>$student->id])}}" method="post">
        						{{csrf_field()}}
        						<table class=" table">
        							<thead>
        								<tr>
        									<th>Assessment</th>
        									<th>Excellent(5)</th>
        									<th>Good(4)</th>
        									<th>Average(3)</th>
        									<th>Fair(2)</th>
        									<th>Poor(1)</th>
        								</tr>
        							</thead>
        							<tbody>
        								<tr>
        									<td>Punctuality</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="punctuality" value="5" required {{($yea && $assessment->data['punctuality'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="punctuality" value="4" required {{($yea && $assessment->data['punctuality'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="punctuality" value="3" required {{($yea && $assessment->data['punctuality'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="punctuality" value="2" required {{($yea && $assessment->data['punctuality'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="punctuality" value="1" required {{($yea && $assessment->data['punctuality'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Adherence to regulations</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adherence" value="5" required {{($yea && $assessment->data['adherence'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adherence" value="4" required {{($yea && $assessment->data['adherence'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adherence" value="3" required {{($yea && $assessment->data['adherence'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adherence" value="2" required {{($yea && $assessment->data['adherence'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adherence" value="1" required {{( $yea && $assessment->data['adherence'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Improvement in Workmanship</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workmanship" value="5" required {{($yea && $yea && $assessment->data['workmanship'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workmanship" value="4" required {{($yea && $yea && $assessment->data['workmanship'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workmanship" value="3" required {{($yea && $yea && $assessment->data['workmanship'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workmanship" value="2" required {{($yea && $yea && $assessment->data['workmanship'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workmanship" value="1" required {{($yea && $yea && $assessment->data['workmanship'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Improvement in Work output</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workoutput" value="5" required {{($yea && $assessment->data['workoutput'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workoutput" value="4" required {{($yea && $assessment->data['workoutput'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workoutput" value="3" required {{($yea && $assessment->data['workoutput'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workoutput" value="2" required {{($yea && $assessment->data['workoutput'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="workoutput" value="1" required {{($yea && $assessment->data['workoutput'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Adaptability</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adaptability" value="5" required {{($yea && $assessment->data['adaptability'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adaptability" value="4" required {{($yea && $assessment->data['adaptability'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adaptability" value="3" required {{($yea && $assessment->data['adaptability'] ==3)?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adaptability" value="2" required {{($yea && $assessment->data['adaptability'] ==2)?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="adaptability" value="1" required {{($yea && $assessment->data['adaptability'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Communication</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="communication" value="5" required {{($yea && $assessment->data['communication'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="communication" value="4" required {{($yea && $assessment->data['communication'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="communication" value="3" required {{($yea && $assessment->data['communication'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="communication" value="2" required {{($yea && $assessment->data['communication'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="communication" value="1" required {{($yea && $assessment->data['communication'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Reliability</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="reliability" value="5" required {{($yea && $assessment->data['reliability'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="reliability" value="4" required {{($yea && $assessment->data['reliability'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="reliability" value="3" required {{($yea && $assessment->data['reliability'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="reliability" value="2" required {{($yea && $assessment->data['reliability'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="reliability" value="1" required {{($yea && $assessment->data['reliability'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        								<tr>
        									<td>Teamwork</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="teamwork" value="5" required {{($yea && $assessment->data['teamwork'] == 5 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="teamwork" value="4" required {{($yea && $assessment->data['teamwork'] == 4 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="teamwork" value="3" required {{($yea && $assessment->data['teamwork'] == 3 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="teamwork" value="2" required {{($yea && $assessment->data['teamwork'] == 2 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        									<td>
        										<label class="fancy-radio">
													<input type="radio" name="teamwork" value="1" required {{($yea && $assessment->data['teamwork'] == 1 )?'checked':''}}>
													<span><i></i></span>
												</label>
        									</td>
        								</tr>
        							</tbody>
        						</table>
        						<div class="form-group">

        							<table class="table">
        								<p><b>Overall assessment</b></p>
        								<thead>
        								<tr>
        									<th></th>
        									<th></th>
        									<th></th>
        									<th></th>
        									<th></th>
        								</tr>
        							</thead>
        								<tbody>
        									<tr>
        										<td>
        											<label class="fancy-radio">
														<input type="radio" name="overall" value="5" required {{($yea && $assessment->data['overall'] == 5 )?'checked':''}} >
														<span><i></i>Excellent</span>
													</label>
        										</td>
        										<td>
        											<label class="fancy-radio">
														<input type="radio" name="overall" value="4" required {{($yea && $assessment->data['overall'] == 4 )?'checked':''}} >
														<span><i></i>Good </span>
													</label>
        										</td>
        										<td>
        											<label class="fancy-radio">
														<input type="radio" name="overall" value="3" required {{($yea && $assessment->data['overall'] == 3 )?'checked':''}} >
														<span><i></i>Average</span>
													</label>
        										</td>
        										<td>
        											<label class="fancy-radio">
														<input type="radio" name="overall" value="2" required {{($yea && $assessment->data['overall'] == 2 )?'checked':''}} >
														<span><i></i>Fair</span>
													</label>
        										</td>
        										<td>
        											<label class="fancy-radio">
														<input type="radio" name="overall" value="1" required {{($yea && $assessment->data['overall'] == 1 )?'checked':''}} >
														<span><i></i>Poor</span>
													</label>
        										</td>
        									</tr>
        								</tbody>
        							</table>
										
        						</div>
        						<div class="form-group">
        							<label>Assesor`s General Remarks</label>
        							<textarea name="remarks" class="form-control" 
        							placeholder="General Remarks" rows="4">{{($yea)?$assessment->comment:''}}</textarea>
        						</div>
        						<div class="form-group">
        							<button class="btn btn-primary" type="submit">Submit Assessment</button>
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