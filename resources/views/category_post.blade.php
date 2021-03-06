@extends('layouts.frontend.app')
@section('title','Welcome')
@push('cs')
    
@endpush
@section('content')
<section class="ftco-section">
<div class="container">
<div class="row">
<div class="col-md-12">
   @if(!$category_post->count() == 0)
   @foreach ($category_post as $row)
        <div class="case">
            <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
            <a href="{{route('post.details',$row->slug)}}" class="img w-100 mb-3 mb-md-0" style="background-image: url({{asset('storage/post/'.$row->image)}})"></a>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
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
   @else
   <h1>No Post Available</h1>
   @endif
    

</div>
</div>
@if(!$category_post->count() == 0)
{{$category_post->links('pagination.view')}}
@endif
</div>
</section>
@endsection
@push('js')
    
@endpush