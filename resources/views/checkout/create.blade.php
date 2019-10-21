@extends('public.app')
@section('content')
<div class="row">
	<div class="col" style="background: #E9ECEF">
		@include('partials.top-nav')
	</div>
</div>

<section class="container pt-5">
	<div class="row">
		<div class="col">
			<h2 class="category-title">Checkout</h2>
		</div>
	</div>
</section>

<section class="container pt-5">
	<div class="row">
		<div class="col-7">
			<div class="row mb-2 pt-5">
				<div class="col"><strong>Billing Details</strong></div>
			</div>
			
			<hr>

			<div class="row">
				<div class="col form-group">
					<label for="">Email</label>
					<input type="email" name="checkout.email" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col form-group">
					<label for="">Name</label>
					<input type="text" name="checkout.name" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col form-group">
					<label for="">City</label>
					<input type="text" name="checkout.name" class="form-control">
				</div>
				<div class="col form-group">
					<label for="">Province</label>
					<input type="text" name="checkout.province" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col form-group">
					<label for="">Postal code</label>
					<input type="text" name="checkout.posta_code" class="form-control">
				</div>
				<div class="col form-group">
					<label for="">Phone</label>
					<input type="text" name="checkout.phone" class="form-control">
				</div>
			</div>

			<div class="row mb-2 pt-5">
				<div class="col"><strong>Payment details</strong></div>
			</div>

			<hr>

			<div class="row">
				<div class="col form-group">
					<label for="">Name on card</label>
					<input type="text" name="checkout.payment.name" class="form-control">
				</div>
			</div>

			<div class="row">
				<div class="col form-group">
					<label for="">Address</label>
					<input type="text" name="checkout.payment.address" class="form-control">
				</div>
			</div>
			
			<div class="row">
				<div class="col form-group">
					<label for="">Credit card number</label>
					<input type="text" name="checkout.payment.address" class="form-control">
				</div>
			</div>

			<div class="row">
				<div class="col form-group">
					<label for="">Expiry</label>
					<input type="text" name="checkout.payment.expiry" class="form-control">
				</div>
				<div class="col form-group">
					<label for="">CVC code</label>
					<input type="text" name="checkout.payment.cvc" class="form-control">
				</div>
			</div>
			
			<div class="row mb-5">
				<div class="col">
					<button class="btn btn-block btn-success">
						Complete order
					</button>
				</div>
			</div>

		</div>

		<div class="col">
			<div class="row mb-2 pt-5">
				<div class="col"><strong>Your order</strong></div>
			</div>
			
			<hr>

			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							@foreach (Cart::content() as $cart)
								<div class="row">
									<div class="col-3">
										<img 
											src="{{$cart->model->image_path}}"
											alt="{{$cart->model->slug}}"
											style="height: 40px;">
									</div>
									<div class="col-7">
										<small class="text-primary">
											{{$cart->model->name}}
										</small>
										<div class="clearfix"></div>
										<small class="text-muted">
											{{$cart->model->details}}
										</small>
										<div class="clearfix"></div>
										<small>
											{{$cart->model->presentPrice()}}
										</small>
									</div>
									<div class="col-2 text-center">
										<span>{{$cart->qty}}</span>
									</div>
								</div>

								<hr>	
							@endforeach

							<div class="row">
								<div class="col">
									<span class="float-left">Subtotal:</span>
									<strong class="float-right">
										{{presentPrice(Cart::subtotal())}}
									</strong>
									
									<div class="clearfix"></div>
									
									<span class="float-left">Tax:</span>
									<strong class="float-right">
										{{presentPrice(Cart::tax())}}
									</strong>

									<div class="clearfix"></div>

									<span class="float-left">Total:</span>
									<strong class="float-right">
										{{presentPrice(Cart::total())}}</strong>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop