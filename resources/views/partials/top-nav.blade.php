<div class="top-nav container">
    <div class="logo"><a href="/">{{__(config('app.name'))}}</a></div>
    <ul>
        <li><a href="{{route('shop.index')}}">Shop</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blog</a></li>
        <li>
            <a href="{{route('cart.index')}}">
        	   <i class="fa fa-shopping-cart"></i>
            </a>
        	<span >
        		<small class="badge badge-pill badge-success">
                    {{Cart::count()}}
                </small>
        	</span>
        </li>
    </ul>
</div>