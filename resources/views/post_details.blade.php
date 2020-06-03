@extends('layouts.frontend.app')
@section('title','Welcome')
@push('cs') 
@endpush
@section('content')

<section class="ftco-section ftco-degree-bg">
<div class="container">
<div class="row">
<div class="col-lg-8 ftco-animate">
<p class="mb-5">
<img src="{{asset('storage/post/'.$post->image)}}" alt="" class="img-fluid">
</p>
<h2 class="mb-3">{{$post->title}}</h2>
<p>{!!$post->body!!}</p>

<div class="tag-widget post-tag-container mb-5 mt-5">
<div class="tagcloud">
    @foreach ($post->tags as $row)
<a href="{{route('tag.posts', $row->slug)}}" class="tag-cloud-link">{{$row->name}}</a>
    @endforeach
</div>
</div>
<div class="about-author d-flex p-4 bg-light">
<div class="bio mr-5">
<img src="{{asset('storage/user/'.$post->user->image)}}" alt="Image placeholder" class="img-fluid mb-4" style="border-radius: 50%">
</div>
<div class="desc">
<h3>{{$post->user->name}}</h3>
<p>{!!$post->user->about!!}</p>
</div>
</div>
    


<div class="row">
    <div class="col-md-12">
        <div class="commetSection">
        <h3 class="mb-5">{{$post->comments->count()}} Comments</h3>
         @foreach ($post->comments as $row)
         <div class="media">
            <img src="{{asset('storage/user/'.$row->user->image)}}" class="mr-3" alt="img" style="border-radius: 50%">
            <div class="media-body">
            <h5 class="mt-0">{{$row->user->name}}</h5>
              {!! $row->body !!}
              @guest
    <strong>to replay you have to login first! <a href="{{route('login')}}">click here to login</a> </strong>
        @else 
        <form method="post" action="{{route('replay.store')}}">
                @csrf
                <div class="form-group">
                    <textarea class="mytxa"  rows="2" name="body"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    <input type="hidden" name="comment_id" value="{{ $row->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply" />
                </div>
            </form>
    @endguest
                  
              @if($row->replies)
              @foreach($row->replies as $item)
              <div class="media mt-3">
                <a class="mr-3" href="#">
                  <img src="..." class="mr-3" alt="...">
                </a>
                <div class="media-body">
                  <h5 class="mt-0">{{$item->user->name}}</h5>
                  {!!$item->body!!}
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
         @endforeach
        </div>
    </div>
</div>

<div class="comment-form-wrap pt-5">
<h3 class="mb-5">Leave a comment</h3>
@guest
<strong>you have to login first! <a href="{{route('login')}}">click here to login</a> </strong>
@else 
<form action="{{route('comment.store')}}" class="p-5 bg-light" method="post">
    @csrf

<div class="form-group">
<label for="message">Comment Here</label>
<textarea name="comment" id="summary-ckeditor" cols="30" rows="10" class="form-control"></textarea>
</div>
<input type="hidden" name="post_id" value="{{$post->id}}">
<div class="form-group">
<input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
</div>
</form>
@endguest
</div>
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
<div><a href="#"><span class="icon-chat"></span>{{$row->comments->count()}}</a></div>
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