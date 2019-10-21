@extends('public.app')
@section('content')
<div class="row">
	<div class="col" style="background: #E9ECEF">
		@include('partials.top-nav')
	</div>
</div>
<div class="row">
	<div class="col">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
		  <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Shop</a></li>
		  <li class="breadcrumb-item active">{{__($product->name)}}</li>
		</ol>
	</div>
</div>
<div class="container pt-5">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body text-center">
					<img src="{{$product->image_path}}" alt="" style="height: 250px">
				</div>
			</div>
		</div>
		<div class="col">
			<h1>{{$product->name}}</h1>
			<div class="clearfix">&nbsp;</div>
			<span class="text-muted">{{$product->details}}</span>
			<h3><strong>{{$product->presentPrice()}}</strong></h3>
			<div class="pt-4">{{$product->description}}</div>
			
			<form action="{{route('cart.store')}}" method="post">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{$product->id}}">
				<input type="hidden" name="name" value="{{$product->name}}">
				<input type="hidden" name="price" value="{{$product->price}}">

				<button type="submit" class="btn btn-outline-secondary">Add to cart</button>
			</form>

		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col"><strong>You might also like...</strong></div>
	</div>
	<div class="row">
		@foreach ($alsoLike as $product)
			<div class="col-3">
				<div class="card card-product">
					<div class="card-body text-center">
                        <a href="{{$product->edit_path}}">
                        	<img src="{{$product->image_path}}" alt="product" class="product-image">
                    	</a>
                    	<div class="clearfix"></div>
                        <a href=""><span class="product-name">{{$product->name}}</span></a>
                        <div class="product-price">{{$product->presentPrice()}}</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@stop