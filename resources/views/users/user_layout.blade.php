@extends('layout.main')

@section('main_content')

@yield('user_card')

	<div class="row clearfix page_header">
		<div class="col-md-4">
			<a class="btn btn-info" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
		</div>	
		<div class="col-md-8 text-right">
		
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
				<i class="fa fa-plus"> </i> New Sale
			</button>

			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
				<i class="fa fa-plus"> </i> New Payment
			</button>
			
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
				<i class="fa fa-plus"> </i> New Purchase
			</button>

			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
			<i class="fa fa-plus"></i> New Receipt
			</button>

		</div>
	</div>
	
	@include('users.user_layout_content')


	<!------ Model for new payments-------------->

	<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			{!! Form::open(['route' => ['user.payments.store' , $user->id],'method' => 'post']) !!}
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPaymentLabel">New Payment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
 
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::date ('date' ,NULL,[ 'class'=>'form-control','id'=>'date','placeholder'=>' Date' , 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amount" class="col-sm-4 col-form-label">Amount<span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::text ('amount' ,NULL,[ 'class'=>'form-control','id'=>'amount','placeholder'=>'Amount' , 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-10">
                    {{ Form::textarea ('note' ,NULL,[ 'class'=>'form-control','id'=>'note', 'rows'=>'3' ,'placeholder'=>'Note']) }}
                    </div>
                </div>

			</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>

	<!------ Model for new receipts-------------->
	
	<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReciptLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		{!! Form::open(['route' => ['user.receipts.store' , $user->id],'method' => 'post']) !!}
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newReciptLabel">New Recipt</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
 
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::date ('date' ,NULL,[ 'class'=>'form-control','id'=>'date','placeholder'=>' Date' , 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amount" class="col-sm-4 col-form-label">Amount<span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::text ('amount' ,NULL,[ 'class'=>'form-control','id'=>'amount','placeholder'=>'Amount' , 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-10">
                    {{ Form::textarea ('note' ,NULL,[ 'class'=>'form-control','id'=>'note', 'rows'=>'3' ,'placeholder'=>'Note']) }}
                    </div>
                </div>

			</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>

	<!------ Model for new sales-------------->

	<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		{!! Form::open(['route' => ['user.sales.store' , $user->id],'method' => 'post']) !!}
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSaleLabel">New Sales Invoice</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
 
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::date ('date' ,NULL,[ 'class'=>'form-control','id'=>'date','placeholder'=>' Date' , 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="challan_no" class="col-sm-4 col-form-label">Challan Number</label>
                    <div class="col-sm-10">
                    {{ Form::text ('challan_no' ,NULL,[ 'class'=>'form-control','id'=>'amount','placeholder'=>'Challan Number' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-10">
                    {{ Form::textarea ('note' ,NULL,[ 'class'=>'form-control','id'=>'note', 'rows'=>'3' ,'placeholder'=>'Note']) }}
                    </div>
                </div>

			</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>

		<!------ Model for new Purchase-------------->

		<div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newPurchaseLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		{!! Form::open(['route' => ['user.purchases.store' , $user->id],'method' => 'post']) !!}
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPurchaseLabel">New Purchases Invoice</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
 
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::date ('date' ,NULL,[ 'class'=>'form-control','id'=>'date','placeholder'=>' Date' , 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="challan_no" class="col-sm-4 col-form-label">Challan Number</label>
                    <div class="col-sm-10">
                    {{ Form::text ('challan_no' ,NULL,[ 'class'=>'form-control','id'=>'amount','placeholder'=>'Challan Number' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-10">
                    {{ Form::textarea ('note' ,NULL,[ 'class'=>'form-control','id'=>'note', 'rows'=>'3' ,'placeholder'=>'Note']) }}
                    </div>
                </div>

			</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>

@stop
 
