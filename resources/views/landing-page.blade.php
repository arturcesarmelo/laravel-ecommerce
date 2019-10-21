@extends('public.app')
@section('content')
<header class="jumbotron pt-4">
    
    <div class="row">
        @include('partials.top-nav')
    </div>

    <div class="clearfix"></div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-6">
                <h1>{{__(config('app.name'))}}</h1>
                <p>
                    A non real system for laravel's pratice development.
                    This site has no intention to sell nothing of any aparently company's product.  
                </p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-outline-primary">
                       <i class="fa fa-github"></i> Documentation
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                       <i class="fa fa-folder"></i> for development
                    </a>
                </div>
            </div>
            <div class="col-6 text-center">
                <img src="{{asset('img/desktop.png')}}" alt="hero image" class="hero-image">
            </div>
        </div>
    </div>
</header>

<section class="featured-section">
    <div class="container">
        <h1 class="text-center">{{__(config('app.name'))}}</h1>
        <p class="section-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aliquam maxime, amet dignissimos minus iusto. Cumque aliquam perferendis sequi sint. Iste dolore blanditiis consequatur ex autem a officiis ullam debitis.
        </p>

        <div class="text-center mb-5">
            <a href="" class="btn btn-outline-primary">Fatured</a>
            <a href="" class="btn btn-outline-primary">On Saled</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3 mb-5">
                    <div class="card card-product">
                        <div class="card-body">
                            <a href="{{$product->edit_path}}">
                                <img src="{{ $product->image_path }}" alt="product" class="product-image">
                            </a>
                            <br />
                            <a href="{{$product->edit_path}}">
                                <span class="product-name">{{$product->name}}</span>
                            </a>
                            <div class="product-price">{{$product->presentPrice()}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mb-5">
        <a href="/shop" class="btn btn-outline-primary">View more products</a>
    </div>
</section>

<section class="p-5">
    <div class="container">
        <h2 class="text-center">From our blog</h2>

        <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam sequi nam placeat repellendus incidunt cum animi magni, veritatis tenetur illo inventore suscipit, officia ratione odio modi molestiae aperiam deserunt aliquid.</p>

        <div class="row">
            @for ($i = 1; $i < 4; $i++)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="#">
                                <img src="{{asset("img/blog{$i}.png")}}" class="blog-image" alt="blog image-{{$i}}">
                            </a>
                            <a href="#">
                                <h2 class="blog-title">Blog Post Title {{$i}}</h2>
                            </a>
                            <div class="blog-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam aperiam a assumenda ipsam tempora
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<footer>
    <div class="row">
        <div class="col-12 text-center p-2"> <i class="fa fa-heart"></i> By Tutti Cesar</div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <ul>
                <li>Follow me:</li>
                <li><a href="#"><i class="fa fa-globe"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-github"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
@endsection