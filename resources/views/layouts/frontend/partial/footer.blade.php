<footer class="ftco-footer ftco-bg-dark ftco-section">
<div class="container">
<div class="row mb-5">
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="logo"><a href="#">{{$basic->blog_name}}.</a></h2>
<p>{!!$basic->slogan!!}</p>
<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
<li class="ftco-animate"><a href="{{$basic->bacebook}}"><span class="icon-facebook"></span></a></li>
<li class="ftco-animate"><a href="{{$basic->linkedin}}"><span class="icon-linkedin"></span></a></li>
<li class="ftco-animate"><a href="{{$basic->twitter}}"><span><i class="fa fa-user-circle" aria-hidden="true"></i></span></a></li>
</ul>
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">popular News</h2>
@foreach ($popular_posts as $row)
<div class="block-21 mb-4 d-flex">
<a href="{{route('post.details',$row->slug)}}" class="img mr-4 rounded" style="background-image: url({{asset('storage/post/'.$row->image)}});"></a>
<div class="text">
<h3 class="heading"><a href="{{route('post.details',$row->slug)}}">{{$row->title}}</a></h3>
<div class="meta">
<div><a href="#"></span> {{$row->created_at->diffForHumans()}}</a></div>
<div><a href="#"></span> {{$row->user->name}}</a></div>
<div><a href="#"></span> {{$row->user->posts->count()}}</a></div>
</div>
</div>
</div>
@endforeach
</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4 ml-md-5">
<h2 class="ftco-heading-2">Categories</h2>

<ul class="list-unstyled">
    @foreach ($categories as $row)
        <li><a href="{{route('category.posts', $row->slug)}}" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>{{$row->name}}</a></li>
    @endforeach
</ul>

</div>
</div>
<div class="col-md">
<div class="ftco-footer-widget mb-4">
<h2 class="ftco-heading-2">Have a Questions?</h2>
<div class="block-23 mb-3">
<ul>
<li><span class="icon icon-map-marker"></span><span class="text">{{$basic->address}}</span></li>
<li><a href="#"><span class="icon icon-phone"></span><span class="text">{{$basic->contact}}</span></a></li>
<li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="0f666169604f76607a7d6b60626e6661216c6062">{{$basic->email}}</span></span></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-center">
<p>
Copyright &copy;<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="6b684cea29124212fda53b8b-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
</p>
</div>
</div>
</div>
</footer>