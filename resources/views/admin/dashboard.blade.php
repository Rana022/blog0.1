@extends('layouts.backend.app')
@section('title', 'ADMIN DASHBOARD')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable">
    <div class="box span12">
        {!! $chart->container() !!}
    </div>
</div>
<div class="box-content">
    <div>
        <table class="table table-striped table-bordered">
      <thead>
          <tr role="row">
              <th>Title</th>

              <th>Image</th>

              <th>About</th>

              <th>View</th>

              <th>Status</th>

              <th>Is Approved</th>

              <th>created_at</th>
              
      </thead>   
      
  <tbody role="alert" aria-live="polite" aria-relevant="all">
      @foreach ($popular_posts as $row)
      <tr class="odd">
            <td class="  sorting_1">{{\Illuminate\Support\Str::limit(strip_tags($row->title), 15, $end='...')}}</td>
            <td>
<img src="{{asset('storage/post/'.$row->image)}}" alt="" width="100px">
</td>
            <td class="  sorting_1">{{\Illuminate\Support\Str::limit(strip_tags($row->body), 15, $end='...')}}</td>
            <td class="  sorting_1">{{$row->view_count}}</td>
            <td class="  sorting_1">
@if ($row->status == 1)
  <span class="badge badge-success">Active</span>
  @else
  <span class="badge badge-danger">Inactive</span>
@endif
</td>
<td class="  sorting_1">
@if ($row->is_approved == 1)
  <span class="badge badge-success">Published</span>
  @else
  <span class="badge badge-danger">Pending</span>
@endif
</td>
            <td class="center ">{{$row->created_at}}</td>
            
        </tr>
      @endforeach
       

    
    </tbody>
</table>

</div>            
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
@endpush