@extends('layout.main')

@section('main_content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit Profile </div>

        <div class="card-body">
          <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

              <div class="col-md-6">
                <input type="text" id="name" value="{{ $editData->name }}" name="name" class="form-control">

              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

              <div class="col-md-6">
                <input type="text" value="{{ $editData->email }}" name="email" class="form-control">

              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

              <div class="col-md-6">
                <input type="text" value="{{ $editData->phone }}" name="phone" class="form-control">

              </div>
            </div>

            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

              <div class="col-md-6">
                <input type="text" value="{{ $editData->address }}" name="address" class="form-control">

              </div>
            </div>

            <div class="form-group row">
              <label for="file" class="col-md-4 col-form-label text-md-right">Image</label>

              <div class="col-md-6">
                <!-- <input type="file" class="form-control-file" id="exampleFormControlFile1"> -->
                <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                <div class="col-auto mt-3">
                  <img id="blah" src="{{ $editData->image }}" alt="your image" width="100" height="100" />
                </div>

              </div>


            </div>


            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Update Profile
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