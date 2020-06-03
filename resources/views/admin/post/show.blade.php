@extends('layouts.backend.app')
@section('title', 'Edit Post')
@push('cs')
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush
@section('content')

<button type="button" class="pull-right btn btn-success {{$post->is_approve == true ? 'disabled' : ''}}" onclick="approveArticle({{$post->id}})">Approve</button>
<form method="post" action="{{route('admin.post.approve', $post->id)}}" id="approve-form-{{$post->id}}" style="display:none">
@csrf
@method('PUT')
</form>
<div class="message">
  <div class="header">
   <h1>"{{$post->title}}"</h1>
    <div class="from"><i class="halflings-icon user"></i> <b>{{$post->user->name}}</b></div>
  <div class="date"><i class="halflings-icon time"></i><b>{{$post->created_at->diffForHumans()}}</b></div>
    
    <div class="menu"></div>
    
  </div>
  
  <div class="content">
    <blockquote>
      {{$post->quote}}
    </blockquote>
  <p>{!!$post->body!!}</p>	
  </div>
  
</div>	
 
@endsection
@push('js')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
  function approveArticle(id){
     Swal.fire({
   title: 'Are you sure?',
   text: "It will approve this Post",
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes, approve it!'
 }).then((result) => {
   if (result.value) {
     event.preventDefault();
       document.getElementById('approve-form-'+id).submit();
     Swal.fire(
       'Approved!',
       'Article has been Approved.',
       'success'
     )
   }
 })
  }
 </script>
@endpush