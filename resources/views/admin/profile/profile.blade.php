@extends('layouts.backend.app')
@section('title', 'Profile')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
				<a href="{{route('admin.profile.edit',$user->id)}}" class="btn btn-sm btn-primary pull-right">Edit Profile</i></a>

					<div class="box-header" data-original-title="">
                    <h2><i class="halflings-icon user"></i><span class="break"></span>{{Auth::user()->name}} Profile</h2>					
					</div>

					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
							<table class="table table-striped table-bordered">
						  <thead>
							  <tr role="row">
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Image</th>
                                  <th>About</th>
                                  <th>created_at</th>
                                  <th>Actions</th></tr>
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
                          <tr class="odd">
                                <td class="  sorting_1">{{$user->username}}</td>
								<td class="  sorting_1">{{$user->email}}</td>
								<td class="text-center">
                <img src="{{asset('storage/user/'.$user->image)}}" alt="" width="60px">
                </td>
								<td class="  sorting_1">{!!$user->about!!}</td>
								
                
								<td class="center ">{{$user->created_at}}</td>
								
								<td class="center ">

               
								<a class="btn btn-info" href="{{route('admin.profile.edit',$user->id)}}">
										<i class="halflings-icon white edit"></i>                                            
                                    </a>
                                    
								</td>
                            </tr>
                           
                
                        
						</tbody>
					</table>
					
				</div>            
					</div>
				</div><!--/span-->
			
			</div>
@endsection
@push('js')

 
@endpush