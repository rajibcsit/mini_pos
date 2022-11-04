@extends('users.user_layout')

@section('user_card')

<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Sales</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $totalSales = 0;
              foreach ($user->sales as $sale) {
                $totalSales += $sale->items()->sum('total');
              }
              echo $totalSales;
              ?>
            </div>
          </div>
          <div class="col-auto">
            <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Purchase</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              $totalPurchase = 0;
              foreach ($user->purchases as $purchase) {
                $totalPurchase += $purchase->items()->sum('total');
              }
              echo $totalPurchase;
              ?>
            </div>
          </div>
          <div class="col-auto">
            <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Receipts</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRecept = $user->receipts()->sum('amount') }}</div>
          </div>
          <div class="col-auto">
            <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Payments</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalPayment = $user->payments()->sum('amount') }} </div>
          </div>
          <div class="col-auto">
            <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $totalBalance = ($totalPurchase + $totalRecept) - ($totalSales + $totalPayment);
  ?>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Balance</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              @if ($totalBalance >= 0)
              {{ $totalBalance }}
              @else
              0
              @endif
            </div>
          </div>
          <div class="col-auto">
            <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-2 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Due</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              @if ($totalBalance < 0) {{ $totalBalance }} @else 0 @endif </div>
            </div>
            <div class="col-auto">
              <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  @stop

  @section('user_content')

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }} </h6>
    </div>

    <div class="card-body">
      <div class="row clearfix justify-content-md-center">
        <div class="col-md-12">
          <table class="table table-bordered table-Light ">
            <tr>
              <th>Group :</th>
              <td> {{ $user->group->title }} </td>
            </tr>
            <tr>
              <th>Name : </th>
              <td> {{ $user->name }} </td>
            </tr>
            <tr>
              <th>Eamil : </th>
              <td> {{ $user->email }} </td>
            </tr>
            <tr>
              <th>Phone : </th>
              <td> {{ $user->phone }} </td>
            </tr>
            <tr>
              <th>Address : </th>
              <td> {{ $user->address }} </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>

  @stop