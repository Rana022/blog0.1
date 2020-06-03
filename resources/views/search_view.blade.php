@extends('layouts.frontend.app')
@section('title','Search')
@push('cs') 
@endpush
@section('content')

<section class="ftco-section ftco-degree-bg">
<div class="container">

<div class="row">
<div class="col-lg-8 ftco-animate">
@if ($search_posts->count() > 0)
@foreach ($search_posts as $row)
<div class="case">
<div class="row">
<div class="col-md-4 col-lg-6 col-xl-6 d-flex">
<a href="{{route('post.details',$row->slug)}}" class="img w-100 mb-3 mb-md-0" style="background-image: url({{asset('storage/post/'.$row->image)}})"></a>
</div>
<div class="col-md-8 col-lg-6 col-xl-6 d-flex">
<div class="text w-100 pl-md-3">
<span class="subheading">Illustration</span>
<h2><a href="{{route('post.details',$row->slug)}}">{{$row->title}}</a></h2>
{!! 
    Share::page(URL::current().'/'.'post/'.$row->slug, null, [], '<ul class="media-social list-unstyled">', '<li class="ftco-animate">', '</li>', '</ul>')
    ->facebook()
    ->twitter()
    ->whatsapp(); !!}
<div class="meta">
<p class="mb-0">{{$row->created_at->diffForHumans()}}</p>
</div>
</div>
</div>
</div>
</div>
    @endforeach
{{$search_posts->links('pagination.view')}}
@else
 <strong>No Post Available!</strong>
@endif

</div> 
<div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
<div class="sidebar-box">
<form action="{{route('search')}}" class="search-form" method="GET">
<div class="form-group">
    <button class="icon icon-search" type="submit"></button>
<input type="text" class="form-control" placeholder="Type a keyword and hit enter" name="search" value="{{request()->search}}">
</div>
</form>
</div>
<div class="sidebar-box ftco-animate">
<div class="categories">
<h3>Categories</h3>
@foreach ($categories as $row)
<li><a href="{{route('category.posts', $row->slug)}}">{{$row->name}} <span class="ion-ios-arrow-forward"></span></a></li>
@endforeach
</div>
</div>
<div class="sidebar-box ftco-animate">
<h3>Recent Blog</h3>
@foreach ($recent_post as $row)
    <div class="block-21 mb-4 d-flex">
<a href="{{route('post.details', $row->slug)}}" class="blog-img mr-4" style="background-image: url({{asset('storage/post/'.$row->image)}});"></a>
<div class="text">
<h3 class="heading"><a href="{{route('post.details', $row->slug)}}">{{$row->title}}</a></h3>
<div class="meta">
<div><a href="#"><span class="icon-calendar"></span> {{$row->created_at->diffForHumans()}}</a></div>
<div><a href="#"><span class="icon-person"></span> {{$row->user->name}}</a></div>
<div><a href="#"><span class="icon-chat"></span> 19</a></div>
</div>
</div>
</div>
@endforeach

 </div>
<div class="sidebar-box ftco-animate">
<h3>Tag Cloud</h3>
<div class="tagcloud">
    @foreach ($tags as $row)
<a href="{{route('tag.posts', $row->slug)}}" class="tag-cloud-link">{{$row->name}}</a>
    @endforeach
</div>
</div>
</div>
</div>


</div>
</section> 

@endsection
@push('js')
    
@endpush