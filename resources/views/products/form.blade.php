@extends('layout.main')

@section('main_content')

<!----- Displaying The Validation Errors ------->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <h2> {{$headline}} </h2>
    
    <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">{{$headline}}</h6>
	    </div>
	    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-12">

                @if ($mode == 'edit')
                    {!! Form::model($product, ['route' => ['products.update',$product->id],'method' => 'put']) !!}
                @else
                    {!! Form::open(['route' => 'products.store','method' => 'post']) !!}
                @endif
            
                <div class="form-group row">
                    <label for="group" class="col-sm-2 col-form-label">Category <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::select('category_id', $categories ,NULL,[ 'class'=>'form-control','id'=>'group','placeholder'=>'Select Category']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::text ('title' ,NULL,[ 'class'=>'form-control','id'=>'title','placeholder'=>'Enter Title']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description <span class="text-danger"> * </span></label>
                    <div class="col-sm-10">
                    {{ Form::textarea ('description' ,NULL,[ 'class'=>'form-control','id'=>'description','placeholder'=>'Enter Description']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cost_price" class="col-sm-2 col-form-label">Cost Price </label>
                    <div class="col-sm-10">
                    {{ Form::text ('cost_price' ,NULL,[ 'class'=>'form-control','id'=>'cost_price','placeholder'=>'Enter Cost Price']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Sale Price</label>
                    <div class="col-sm-10">
                    {{ Form::text ('price' ,NULL,[ 'class'=>'form-control','id'=>'sale_price','placeholder'=>'Enter Sale  Price']) }}
                    </div>
                </div>

   
                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-primary"> <i class=" fa fa-save"> </i> Submit</button>
                </div>

            {!! Form::close() !!}
            </div>
        </div>

	      </div>
	    </div>
@stop