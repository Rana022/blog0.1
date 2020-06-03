@extends('layouts.backend.app')
@section('title', 'Authors List')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Authors</h2>					
					</div>

					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
							<table class="table table-striped table-bordered" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  <thead>
							  <tr role="row">
                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">Name</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">User Name</th>

                                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 206px;">created_at</th>
                                  
                                  
                                 
                                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 257px;">Actions</th></tr>
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
                          @foreach ($authors as $row)
                          <tr class="odd">
								<td class="  sorting_1">{{$row->name}}</td>
								<td class="  sorting_1">{{$row->username}}</td>
								<td class="center ">{{$row->created_at}}</td>
								
								<td class="center ">
								
                  <button type="button" class="btn btn-primary waves-effect" onclick="makeAdmin({{$row->id}})">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>                                             
                  </button>
                   <form id="admin-form-{{$row->id}}" action="{{route('admin.author.promotion',$row->id)}}" method="post" style="display:none">
                    @csrf
                    @method('PUT')
                    </form>

									 <button type="button" class="btn btn-danger waves-effect"
                                                onclick="deleteAuthor({{$row->id}})">
                                              <i class="halflings-icon white trash"></i> 
                                                    </button>

                                        <form id="delete-form-{{$row->id}}" action="{{route('admin.author.destroy', $row->id)}}" method="post" style="display:none">
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
      













      <div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Admins</h2>					
					</div>

					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
							<table class="table table-striped table-bordered" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
						  <thead>
							  <tr role="row">
                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">Name</th>

                                  <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 286px;">User Name</th>

                                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 206px;">created_at</th>
                                  
                                  
                                 
                                  <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 257px;">Actions</th></tr>
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
                          @foreach ($admins as $row)
                          <tr class="odd">
								<td class="  sorting_1">{{$row->name}}</td>
								<td class="  sorting_1">{{$row->username}}</td>
								<td class="center ">{{$row->created_at}}</td>
								
								<td class="center ">
								  @if ($row->username !== Auth::user()->username)
                  <button type="button" class="btn btn-primary waves-effect" onclick="makeAuthor({{$row->id}})">
                    <i class="fa fa-user-times" aria-hidden="true"></i>                                             
                  </button>
                   <form id="author-form-{{$row->id}}" action="{{route('admin.adm.demotion',$row->id)}}" method="post" style="display:none">
                    @csrf
                    @method('PUT')
                    </form>

									 <button type="button" class="btn btn-danger waves-effect"
                                                onclick="deleteAdmin({{$row->id}})">
                                              <i class="halflings-icon white trash"></i> 
                                                    </button>

                                        <form id="adm-delete-form-{{$row->id}}" action="{{route('admin.adm.admDestroy', $row->id)}}" method="post" style="display:none">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                  @endif
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
            function deleteAuthor(id){
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You want to remove this author!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, remove that!',
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
      'Your author is safe :)',
      'error'
    )
  }
})

            }

            function makeAdmin(id){
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You want to make Admin!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
      document.getElementById('admin-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your author not promoted :)',
      'error'
    )
  }
})

            }

             function deleteAdmin(id){
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You want to remove this admin!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
      document.getElementById('adm-delete-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your admin is safe :)',
      'error'
    )
  }
})

            }

            function makeAuthor(id){
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You want to make Author!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
    event.preventDefault();
      document.getElementById('author-form-'+id).submit();
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your author not demoted :)',
      'error'
    )
  }
})

            }
            
            </script>
 
@endpush