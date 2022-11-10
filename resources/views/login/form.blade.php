@extends('layout.primary')

@section('page_body')


<div class="container mt-5">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image">
              <img class="bg-login-image" src="{{asset ('template/img/login.png')}}">
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <div>
                    <img class="top-login-image" src="{{asset ('template/img/tw_1.png')}}">
                  </div>
                  <h1 class="h4 text-web mb-4">Welcome <strong> TwitSoft </strong> </h1>
                </div>
                {!! Form::open([ 'route' => 'login.confirm', 'method' => 'post' ]) !!}

                <div class="form-group">
                  <label for="">Email Address</label>
                  {{ Form::text('email', NULL, [ 'class'=>'form-control form-control-user', 'id' => 'email', 'placeholder' => 'Enter Email Address..' ]) }}
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  {{ Form::password('password', [ 'class'=>'form-control form-control-user', 'id' => 'password', 'placeholder' => 'Enter Password' ]) }}
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>

                <div class="form-group reset_password">
                  <a href="{{ route('forget.password') }}">Forgot your password? </a>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                <div class="row mt-4">
                  <div class="col-md-7">
                    <p>Don't have an account? </p>
                  </div>
                  <div class="col-md-5 signup">
                    <a href="{{ route('register') }}">Signup </a>
                  </div>
                </div>

                {!! Form::close() !!}


              </div>
            </div>
          </div>
        </div>

      </div>

    </div>


    @stop