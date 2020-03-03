@extends('layouts.student')

@section('content')

                    <div class="row mt-3">
                        <div class="col-md-4 col-sm-8 mx-auto">
                            <div class="card border-0">
                                <div class="card-header border-0 text-center">LOGIN</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                         {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">
                                                  <i class="fa fa-user fa-fw"></i>
                                              </span>
                                              <input type="text" class="form-control
                                              {{(!$errors->has('regno'))?'':'is-invalid'}}" placeholder="ct202/0036/14" aria-describedby="basic-addon1" name="regno" 
                                              value="{{old('regno')}}">
                                            </div>
                                            @if($errors->has('regno'))
                                            <div class="form-text text-danger">{{$errors->first('regno')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                              <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-key fa-fw"></i>
                                              </span>
                                              <input type="password" class="form-control
                                              {{(!$errors->has('password'))?'':'is-invalid'}}" placeholder="password" aria-describedby="basic-addon1" name="password" 
                                              >
                                            </div>
                                            @if($errors->has('password'))
                                            <div class="form-text text-danger">{{$errors->first('password')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="Login">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
@endsection
