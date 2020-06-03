@extends('layouts.backend.app')
@section('title', 'Author')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
				<a href="{{route('author.post.create')}}" class="btn btn-sm btn-primary pull-right">Add Post</i></a>

					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Post</h2>					
					</div>

					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
							<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  <thead>
							  <tr role="row">
                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">Title</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">Image</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">About</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">View</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">Status</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">Is Approved</th>

                                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 206px;">created_at</th>
                                  
                                  
                                 
                                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 257px;">Actions</th></tr>
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
                          @foreach ($post as $row)
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
								
								<td class="center ">
               
								<a class="btn btn-info" href="{{route('author.post.edit',$row->id)}}">
										<i class="halflings-icon white edit"></i>                                            
									</a>

									 <button type="button" class="btn btn-warning waves-effect"
                                                onclick="postStatusActive({{$row->id}})">
                                              <i class="icon-thumbs-up"></i> 
                                                    </button>

                                        <form id="status-form-{{$row->id}}" action="{{route('author.post.active', $row->id)}}" method="post" style="display:none">
                                        @csrf
                                        @method('PUT')
                                        </form>

                  <button type="button" class="btn btn-danger waves-effect"
                                                onclick="deletePost({{$row->id}})">
                                              <i class="halflings-icon white trash"></i> 
                                                    </button>

                                        <form id="delete-form-{{$row->id}}" action="{{route('author.post.destroy', $row->id)}}" method="post" style="display:none">
                                        @csrf
                                        @method('DELETE')
                                        </form>
								
								</td>
                            </tr>
                          @endforeach
                           
                
                        
						</tbody>
					</table>
					
				</div>            
					</div>
				</div><!--/span-->
			
			</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

            <script type="text/javascript">
            //function for active status
            function postStatusActive(id){
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "it will active your post!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, Active it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
      document.getElementById('status-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your Post not Active :)',
      'error'
    )
  }
})

            }

            //function for deletePOst
            function deletePost(id){
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
      document.getElementById('delete-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your Post is safe :)',
      'error'
    )
  }
})

            }
            
            </script>
 
@endpush