<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
<a class="navbar-brand" href="{{route('home')}}">{{$basic->blog_name}}.</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>
<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
@auth
<li class="nav-item"><a href="{{Auth::user()->id == 1 ? route('admin.dashboard') : route('author.dashboard')}}" class="nav-link">Dashboard</a></li>
@else
<li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
<li class="nav-item"><a href="{{route('register')}}" class="nav-link">Registration</a></li>
@endauth
@foreach ($categories as $row)
<li class="nav-item"><a href="{{route('category.posts', $row->slug)}}" class="nav-link">{{$row->name}}</a></li>
@endforeach

</ul>
</div>
</div>
</nav>

@if (Request::is('/'))
    <div class="hero-wrap js-fullheight" style="background-image: url('{{asset("assets/frontend/images/bg_1.jpg")}}');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
<div class="col-md-12 ftco-animate">
<h2 class="subheading">{{$basic->welcome_speech}}</h2>
<h1 class="mb-4 mb-md-0">{{$basic->blog_name}}</h1>
<div class="row">
<div class="col-md-7">
<div class="text">
<p>{!!$basic->slogan!!}</p>
<div class="mouse">
<a href="#" class="mouse-icon">
<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endif

@if (Request::is('login'))
    <div class="hero-wrap js-fullheight" style="background-image: url('{{asset("assets/frontend/images/bg_1.jpg")}}');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
<div class="col-md-12 ftco-animate">
<h2 class="subheading">{{$basic->welcome_speech}}</h2>
<h1 class="mb-4 mb-md-0">Login</h1>
</div>
</div>
</div>
</div>
@endif

@if (Request::is('register'))
    <div class="hero-wrap js-fullheight" style="background-image: url('{{asset("assets/frontend/images/bg_1.jpg")}}');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
<div class="col-md-12 ftco-animate">
<h2 class="subheading">{{$basic->welcome_speech}}</h2>
<h1 class="mb-4 mb-md-0">Register</h1>
</div>
</div>
</div>
</div>
@endif



@if (Request::is('post*'))
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
<div class="col-md-9 ftco-animate pb-5 text-center">
<h1 class="mb-3 bread">Details</h1>
<p class="breadcrumbs">
<span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
    @foreach ($categories as $row)
     <span class="mr-2"><a href="{{route('category.posts', $row->slug)}}">{{$row->name}} <i class="ion-ios-arrow-forward"></i></a></span>
        
    @endforeach
</div>
</div>
</div>
</section>
@endif

@if (Request::is('category*'))
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
<div class="col-md-9 ftco-animate pb-5 text-center">
<h1 class="mb-3 bread">{{$category->name}}</h1>
<p class="breadcrumbs">
<span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
    @foreach ($categories as $row)
<span class="mr-2"><a href="{{route('category.posts', $row->slug)}}">{{$row->name}} <i class="ion-ios-arrow-forward"></i></a></span>
        
    @endforeach
</div>
</div>
</div>
</section>
@endif

@if (Request::is('tag*'))
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
<div class="col-md-9 ftco-animate pb-5 text-center">
<h1 class="mb-3 bread">{{$tag->name}}</h1>
<p class="breadcrumbs">
<span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
    @foreach ($categories as $row)
<span class="mr-2"><a href="{{route('tag.posts', $row->slug)}}">{{$row->name}} <i class="ion-ios-arrow-forward"></i></a></span>
        
    @endforeach
</div>
</div>
</div>
</section>
@endif

@if (Request::is('search*'))
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
<div class="col-md-9 ftco-animate pb-5 text-center">
<h1 class="mb-3 bread">Results On {{request()->search}}</h1>
<p class="breadcrumbs">
<span class="mr-2"><a href="{{route('home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
    @foreach ($categories as $row)
<span class="mr-2"><a href="{{route('tag.posts', $row->slug)}}">{{$row->name}} <i class="ion-ios-arrow-forward"></i></a></span>
        
    @endforeach
</div>
</div>
</div>
</section>
@endif


