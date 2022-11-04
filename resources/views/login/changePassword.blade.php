@extends('layout.main')

@section('main_content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Change Password </div>

        <div class="card-body">
          <form method="POST" action="{{ route('change.password') }}">
            @csrf

            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Old Password <span class="text-danger"> * </span></label>

              <div class="col-md-6">
                <input type="password" id="current_password" name="oldpassword" class="form-control">

              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">New Password <span class="text-danger"> * </span></label>

              <div class="col-md-6">
                <input type="password" id="password" name="password" class="form-control">

              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password <span class="text-danger"> * </span></label>

              <div class="col-md-6">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">

              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Update Password
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@stop