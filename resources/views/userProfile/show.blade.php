@extends('layout.main')

@section('main_content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"> User Profile Information </h6>

        </div>
        <div class="col-auto justify-content-center mt-3">
          @if($authUser->image)
          <img class="rounded-circle" style="width: 100px;" src="{{ $authUser->image }}" alt="Avatar">
          @endif

        </div>

        <div class="card-body profile">

          <p> Name : {{ $authUser->name }} </p>
          <p> Email : {{ $authUser->email }} </p>
          <p> Phone : {{ $authUser->phone }} </p>
          <p> Address : {{ $authUser->address }} </p>
        </div>
        <div class="col-auto text-center mb-4">
          <a href="{{ route('profile.edit')  }}" class="btn btn-primary"> Edit Profile</a>
        </div>
      </div>
    </div>
  </div>

</div>


@stop