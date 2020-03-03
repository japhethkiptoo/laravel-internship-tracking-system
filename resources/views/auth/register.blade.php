@extends('layouts.student')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header border-0 text-center">Register</div>
            <div class="card-body">
                @if(!empty($errors))
                  <pre>
                      {{$errors}}
                  </pre>
                 
                 @endif
                <form  method="POST" action="{{ route('register') }}">
                   {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-control-label" for="identifier">Registartion No.</label>
                        <input id="identifier" class="form-control" type="text" name="regno" placeholder="ct202/0036/14" value="{{Old('regno')}}">

                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="national_id">ID No.</label>
                        <input id="national_id" class="form-control" type="text" name="idno" placeholder="ID Card">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="submit">
                        <a class="btn btn-link" href="{{ route('login') }}">already registered? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
