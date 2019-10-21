
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
		  <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
		  <li class="breadcrumb-item active">Cart</li>
		</ol>
	</div>
</div>
<section class="container">
	<div class="row">
		<div class="col-7">
			@if (session()->has('success_message'))
				<div class="row">
					<div class="col">
						<div class="alert  alert-success">
							<strong>{{session()->get('success_message')}}</strong>
						</div>
					</div>
				</div>
			@endif

			@if (count($errors))
				<div class="row">
					<div class="col">
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			@endif

			<div class="row">
				<div class="col pt-5">
					<strong>{{Cart::count() > 0 ? Cart::count() : 'No'}} item(s) in Shopping Cart</strong>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table">
						@foreach (Cart::content() as $cart)
							<tr class="tr">
								<td>
									<a href="{{$cart->model->edit_path}}">	
										<img 
											src="{{$cart->model->image_path}}"
											alt="macbook-pro.png" 
											style="height: 50px" />
									</a>
								</td>
								<td>
									<a href="{{$cart->model->edit_path}}" class="text-primary">
										{{$cart->model->name}}
									</a>
									<br>
									<small class="text-muted">{{$cart->model->details}}</small>
								</td>
								<td>
									<form action="{{route('cart.destroy', $cart->rowId)}}" method="post" id="remove-form">
										{{csrf_field()}}
										{{ method_field('delete') }}
										<small
											class="cursor-pointer" 
											onclick="document.getElementById('remove-form').submit()">
											Remove
										</small>
									</form>
									<form action="{{route('cart.save_for_later', $cart->rowId)}}" method="post" id="save-for-later-form">
										{{csrf_field()}}
										<small class="cursor-pointer" 
											class="cursor-pointer" 
											onclick="document.getElementById('save-for-later-form').submit()">
											Save
										</small>
									</form>
								</td>
								<td>
									<select name="" id="" class="form-control">
										@for ($i = 1; $i < 10; $i++)
											<option value="$i" @if($i == $cart->qty) selected @endif>{{$i}}</option>
										@endfor
									</select>
								</td>
								<td>
									<small>{{$cart->model->presentPrice()}}</small>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
		<div class="col">
			{{-- // --}}
		</div>
	</div>
</section>

@if (Cart::count())
	<section class="container">
		<div class="row">
			<div class="col">
				<span class="text-muted">
					Have a code?
				</span>
				<br>
				<input type="text" style="height: 40px">
				<button class="btn btn-outline-primary">Apply</button>
			</div>
		</div>
	</section>
	<section class="container pt-5">
		<div class="row">
			<div class="col-7">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-6 text-justify">
								<small class="">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui perferendis, fugit saepe quos exercitationemLorem ipsum dolor
								</small>
							</div>
							<div class="col-6 text-right">
								<span>Subtotal: {{presentPrice(Cart::subtotal())}}</span>
								<br>
								<span>Tax: {{presentPrice(Cart::tax())}}</span>
								<br>
								<strong>Total: {{presentPrice(Cart::total())}}</strong>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<a href="{{route('shop.index')}}" class="btn btn-outline-secondary">	Continue Shopping
								</a>
							</div>
							<div class="col-6 text-right">
								<a href="{{ route('checkout.create') }}" class="btn btn-success">Proceed to Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
@else
<section class="container">
	<div class="row">
		<div class="col-6">
			<a href="{{route('shop.index')}}" class="btn btn-outline-secondary">
				Continue Shopping
			</a>
		</div>
	</div>
</section>
@endif

<section class="container">
	<div class="row">
		<div class="col-7">
			<div class="row">
				<div class="col pt-5">
					<strong>
						{{Cart::instance('save-for-later')->count() ? Cart::instance('save-for-later')->count() : 'No'}} item(s) saved for later
					</strong>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table">
						@foreach (Cart::instance('save-for-later')->content() as $cart)
							<tr class="tr">
								<td>
									<a href="{{$cart->model->edit_path}}">	
										<img 
											src="{{$cart->model->image_path}}"
											alt="macbook-pro.png" 
											style="height: 50px" />
									</a>
								</td>
								<td>
									<a href="{{$cart->model->edit_path}}" class="text-primary">
										{{$cart->model->name}}
									</a>
									<br>
									<small class="text-muted">{{$cart->model->details}}</small>
								</td>
								<td>
									<form action="{{route('save_for_later.destroy', $cart->rowId)}}" method="post" id="remove-form">
										{{csrf_field()}}
										{{ method_field('delete') }}
										<input type="hidden" name="instance" value="save-for-later">
										<small
											class="cursor-pointer" 
											onclick="document.getElementById('remove-form').submit()">
											Remove save
										</small>
									</form>
									<form action="{{route('save_for_later.switch_to_cart', $cart->rowId)}}" method="post" id="restore-to-cart">
										{{csrf_field()}}
										<small class="cursor-pointer" 
											class="cursor-pointer" 
											onclick="document.getElementById('restore-to-cart').submit()">
											restore
										</small>
									</form>
								</td>
								<td>
									<strong>qty: {{$cart->qty}}</strong>
								</td>
								<td>
									<span>{{$cart->model->presentPrice()}}</span>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@stop