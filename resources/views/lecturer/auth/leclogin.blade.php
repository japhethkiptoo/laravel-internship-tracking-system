
@extends('lecturer.ext.main')

@section('topnav')

@endsection

@section('sidenav')

@endsection

@section('content')

<dv class="vertical-align-wrap" style="top:50%; transform:translateY(-50%); 
                                       -webkit-transform:translateY(-50%);">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left" style="height: 0 !important;">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{ asset('assets/img/logo-dark.png')}}" alt="Klorofil Logo"></div>
								<p class="lead">Login</p>
							</div>

							@if($errors->has('email')&&$errors->has('password'))
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-times-circle"></i> All fields are required!
							</div>
							@endif
							@if($errors->has('password') && !$errors->has('email'))
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-times-circle"></i>{{$errors->first('password')}}
							</div>
							@endif
							@if($errors->has('email') && !$errors->has('password'))
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-times-circle"></i>{{$errors->first('email')}}
							</div>
							@endif
							<form  method="POST" class="form-auth-small" action="{{ route('lec.login')}}">
								{{csrf_field()}}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Registration No.</label>
									<input type="text" class="form-control" id="signin-email" name="email" value="{{old('email')}}" placeholder="example@example.com">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password" placeholder="password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember" checked>
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Lecturer Login</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
</div>


@endsection

