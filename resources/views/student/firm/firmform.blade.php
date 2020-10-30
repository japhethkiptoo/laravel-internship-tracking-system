<div class="mx-auto w-50">
	<h5>Firm Form</h5>
	<form action="{{ route('firm.store')}}" method="POST" accept-charset="utf-8">
		{{csrf_field()}}
		<div class="form-group {{(!$errors->has('firm'))?'':'text-danger'}}">
			<label for="exampleInputEmail1">Firm / Organisation</label>
    		<input name="firm" type="text" class="form-control {{(!$errors->has('firm'))?'':'is-invalid'}}" id="exampleInputEmail1" placeholder="Company name" value="{{old('firm')}}">
    		@if($errors->has('firm'))
    		<small class="form-text">{{ $errors->first('firm')}}</small>
    		@endif
		</div>
		<div class="form-group {{(!$errors->has('address'))?'':'text-danger'}}">
			<label for="input2">Address</label>
    		<input name="address" type="text" class="form-control {{(!$errors->has('address'))?'':'is-invalid'}}" id="input2" placeholder="Address" value="{{old('address')}}">
    		@if($errors->has('address'))
    		<small class="form-text">{{ $errors->first('address')}}</small>
    		@endif
		</div>
		<div class="row form-group">
		  <div class="col-md-6 {{(!$errors->has('tel'))?'':'text-danger'}}">
		  	<label>Phone Number(Primary)</label>
		    <input name="tel" type="tel" class="form-control {{(!$errors->has('tel'))?'':'is-invalid'}}" placeholder="Phone Number" value="{{old('tel')}}">
		    @if($errors->has('tel'))
    		<small class="form-text">{{ $errors->first('tel')}}</small>
    		@endif
		  </div>		  
		</div>

		<div class="form-group {{(!$errors->has('supervisor_name'))?'':'text-danger'}}">
			<label for="input4">Supervisor`s / Foreman`s Name </label>
    		<input name="supervisor_name" type="text" class="form-control {{(!$errors->has('supervisor_name'))?'':'is-invalid'}}" id="input4" placeholder="supervisor" value="{{old('supervisor_name')}}">
    		@if($errors->has('supervisor_name'))
    		<small class="form-text">{{ $errors->first('supervisor_name')}}</small>
    		@endif
		</div>
		<div class="form-group {{(!$errors->has('supervisor_email'))?'':'text-danger'}}">
			<label for="input4">Supervisor`s / Foreman`s Email </label>
    		<input name="supervisor_email" type="text" class="form-control {{(!$errors->has('supervisor'))?'':'is-invalid'}}" id="input4" placeholder="supervisor email" value="{{old('supervisor_email')}}">
    		@if($errors->has('supervisor_email'))
    		<small class="form-text">{{ $errors->first('supervisor_email')}}</small>
    		@endif
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>