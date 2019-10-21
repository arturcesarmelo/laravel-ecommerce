@extends("public.app")
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
		  <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Shop</a></li>
		  @if(isset($category_slug))
		  <li class="breadcrumb-item active">{{__(str_replace('-', ' ', $category_slug))}}</li>
		  @endif
		</ol>
	</div>
</div>
<div class="container">
	<div class="row pt-5">
		<div class="col-2">
			<div class="row">
				<div class="col-12">
					<strong>By Category</strong>
					<ul class="list-style-none">
						@foreach($categories as $category)
							<li>
								<a href="{{route('shop.by_category', $category->slug)}}">
									{{$category->name}}
								</a>
							</li>
						@endforeach
					</ul>
				</div>

				<div class="col-12">
					<strong>By Price</strong>
					<ul class="list-style-none">
						<li><a href="">$0 - $700</a></li>
						<li><a href="">$700 - $2500</a></li>
						<li><a href="">$2500+</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-10 container">
			<div class="row">
				<div class="col">
					@if(isset($category_slug))
						<h2 class="category-title">
							{{__(str_replace('-', ' ', $category_slug))}} ({{($products->count())}})
						</h2>
					@else
						<h2 class="category-title">
							Products ({{($products->count())}})
						</h2>
					@endif
				</div>
			</div>

			<div class="row pt-5">
				<div class="col">
					{{ $products->links() }}
				</div>
			</div>
			<div class="row">
				@foreach ($products as $product)
	                <div class="col-4 mb-5">
	                    <div class="card card-product">
	                        <div class="card-body">
	                        	{{$product->category}}
	                            <a href="{{$product->edit_path}}">
	                            	<img src="{{$product->image_path}}" alt="product" class="product-image">
                            	</a>
	                            <a href="{{$product->edit_path}}">
	                            	<span class="product-name">{{$product->name}}</span>
	                            </a>
	                            <div class="product-price">{{$product->presentPrice()}}</div>
	                        </div>
	                    </div>
	                </div>
	            @endforeach
			</div>
			<div class="row">
				<div class="col">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection