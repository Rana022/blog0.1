@extends('layouts.backend.app')
@section('title', 'BASIC INFO')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable ui-sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon user"></i><span class="break"></span>Basic</h2>					
					</div>

					<div class="box-content">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
							<table class="table table-striped table-bordered">
						  <thead>
							  <tr role="row">
                                  <th>Blog Name</th>
                                  <th>Wlc Speech</th>
                                  <th>Slogan</th>
                                  <th>Address</th>
                                  <th>Contact</th>
                                  
						  </thead>   
						  
					  <tbody role="alert" aria-live="polite" aria-relevant="all">
              <tr class="odd">
								<td class="  sorting_1">{{$basic->blog_name}}</td>
								<td class="center ">{{$basic->welcome_speech}}</td>
								<td class="center ">{!!$basic->slogan!!}</td>
								<td class="center ">{{$basic->address}}</td>
								<td class="center ">{{$basic->contact}}</td>
               </tr>
                              
						</tbody>
          </table>
          
          <table class="table table-striped table-bordered">
            <thead>
              <tr role="row">
                                <th>Email</th>
                                <th>Facebook</th>
                                <th>Linkedin</th>
                                <th>Twitter</th>
                                <th>Action</th>
                                
            </thead>   
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <tr class="odd">
              <td class="center ">{{$basic->email}}</td>
              <td class="center ">{{$basic->facebook}}</td>
              <td class="center ">{{$basic->linkedin}}</td>
              <td class="center ">{{$basic->twitter}}</td>
              
              <td class="center ">
              <a class="btn btn-info" href="{{route('admin.basic.edit',$basic->id)}}">
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