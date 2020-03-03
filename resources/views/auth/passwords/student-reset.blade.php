@extends('layouts.student')

@section('content')

<div class="mx-auto col-md-6">
	<form  method="POST" action="{{ route('reset.password') }}">
                        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }}">
                <label for="email" class="form-control-label">E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                <label for="password" class="form-control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
                <label for="password-confirm" class="form-control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>
    </form>
	
</div>

@endsection