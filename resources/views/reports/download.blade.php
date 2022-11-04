<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> </title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset ('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="https://kit.fontawesome.com/2d28bae963.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="{{ asset ('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{ asset ('template/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <div class="container mt-3">
    <div class="col-md-3">
      <h2> Day Reports </h2>
    </div>

    <!--Card for  days report -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Sales </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format($sales->sum('total'), 2) }} </div>
              </div>
              <div class="col-auto">
                <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Purchases </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format($purchases->sum('total'), 2) }} </div>
              </div>
              <div class="col-auto">
                <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Receipts </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format( $receipts->sum('amount'),2) }} </div>
              </div>
              <div class="col-auto">
                <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Payments </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ number_format( $payments->sum('amount'),2) }} </div>
              </div>
              <div class="col-auto">
                <img class="dasbord-icon " src="{{asset ('template/img/taka.png')}}">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


    <!-- DataTales Example for days Sales report -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sales Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Price</th>
                <th class="text-right">Total</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($sales as $sale)
              <tr>
                <td> {{ $sale->title }} </td>
                <td class="text-right"> {{ $sale->quantity }} </td>
                <td class="text-right"> {{ number_format($sale->price, 2) }} </td>
                <td class="text-right"> {{ number_format($sale->total, 2) }} ৳ </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th class="text-right">Ttoal Items:</th>
                <th class="text-right"> {{ $sales->sum('quantity') }} </th>
                <th class="text-right">Total:</th>
                <th class="text-right"> {{ number_format($sales->sum('total'), 2) }} ৳</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <!-- DataTales Example for days Purchases report -->

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Purchases Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Price</th>
                <th class="text-right">Total</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($purchases as $purchase)
              <tr>
                <td> {{ $purchase->title }} </td>
                <td class="text-right"> {{ $purchase->quantity }} </td>
                <td class="text-right"> {{ number_format($purchase->price, 2) }} </td>
                <td class="text-right"> {{ number_format($purchase->total, 2) }} ৳ </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th class="text-right">Ttoal Items:</th>
                <th class="text-right"> {{ $purchases->sum('quantity') }} </th>
                <th class="text-right">Total:</th>
                <th class="text-right"> {{ number_format($purchases->sum('total'), 2) }} ৳ </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <!-- DataTales Example for days Receipts report -->

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Receipts Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm" cellspacing="0">
            <thead>
              <tr>
                <th>User</th>
                <th>Phone</th>
                <th class="text-right">Amount</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($receipts as $receipt)
              <tr>
                <td> {{$receipt->name }} </td>
                <td> {{$receipt->phone }} </td>
                <td class="text-right"> {{ number_format($receipt->amount,2) }} ৳ </td>
              </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr>
                <th colspan="2" class="text-right">Total:</th>
                <th class="text-right"> {{ number_format( $receipts->sum('amount'),2) }} ৳ </th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>

    <!-- DataTales Example for days Payment report -->

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Payment Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm" cellspacing="0">
            <thead>
              <tr>
                <th>User</th>
                <th>Phone</th>
                <th class="text-right">Amount</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($payments as $payment)
              <tr>
                <td> {{$payment->name }} </td>
                <td> {{$payment->phone }} </td>
                <td class="text-right"> {{ number_format($payment->amount,2) }} ৳ </td>
              </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr>
                <th colspan="2" class="text-right">Total:</th>
                <th class="text-right"> {{ number_format( $payments->sum('amount'),2) }} ৳ </th>
              </tr>
            </tfoot>

          </table>
        </div>
      </div>
    </div>
    <div class="col-auto mb-5">
      <form class="text-right">
        <input type="button" value="Print" onclick="window.print()" />
      </form>
    </div>

  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"></script> -->
  <script src="{{ asset ('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset ('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset ('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset ('template/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset ('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset ('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset ('template/js/demo/datatables-demo.js')}}"></script>

</body>

</html>