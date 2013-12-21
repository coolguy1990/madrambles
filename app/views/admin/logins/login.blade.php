@extends('layouts.admin.master')

@section('title')
  Admin
@stop

@section('content')
  <div id="login-region">
    <h1>{{ 'Login Into the Admin Panel' }}</h1>
    @if (Session::has('login_errors'))
      <div class="alert alert-block alert-error">
        <p>
          Your username or password is incorrect
          <a href="{{ url('admin/login/remind') }}">Forgot Password</a>
        </p>
      </div>
    @endif
    {{ Form::open(['class' => 'form-horizontal']) }}
            <div>
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email') }}
            </div>

            <div>
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
            </div>

            <div>
                {{ Form::submit('Login', ['class' => 'btn']) }}
            </div>
    {{ Form::close() }}
  </div>
@stop
