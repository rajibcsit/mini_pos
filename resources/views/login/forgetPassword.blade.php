@extends('layout.primary')

@section('page_body')


<div class="container mt-5">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-login-image">
              <img class="bg-login-image" src="{{asset ('template/img/forgot-password.webp')}}">
            </div>
            <div class="col-lg-7">
              <div class="p-0">
                <div class="text-center">
                  <div>
                    <img class="top-logo-image" src="{{asset ('template/img/tw_1.png')}}">
                  </div>
                  <h1 class="h4 text-web mb-4">Welcome <strong> TwitSoft </strong> </h1>
                </div>
              </div>
              <div class="card-header mb-4">Reset Password</div>
              @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
              </div>
              @endif
              <form action="{{ route('forget.password') }}" method="POST">
                @csrf
                <div class="form-group row">
                  <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address <span class="text-danger"> * </span></label>
                  <div class="col-md-7">
                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-md-7 offset-md-4 mt-5">
                  <button type="submit" class="btn btn-primary">
                    Send Password Reset Link
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>


    @stop