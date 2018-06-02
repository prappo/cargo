@extends('layouts.auth')
@section('title', 'Login | Cargo')
@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Cargo</b></a>
        </div>

        <div class="login-box-body">

            <form role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-group has-feedback">
                        <input type="email" placeholder="Your email" class="form-control" name="email"
                               value="{{ old('email') }}" autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="form-group has-feedback">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">

                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-sign-in"></i> <b>Sign In</b></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
