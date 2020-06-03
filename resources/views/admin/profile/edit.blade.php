@extends('layouts.backend.app')
@section('title', 'Profile')
@push('cs')
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush
@section('content')

			<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<a href="{{route('admin.profile')}}" class="btn btn-sm btn-primary pull-right">Profile</i></a>
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Profile</h2>
						
					</div>
					<div class="box-content">
					<form class="form-horizontal" method="post" action="{{route('admin.profile.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
						  <fieldset>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Name: </label>
							  <div class="controls">
                              <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="name" value="{{$user->name}}">
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Email  : </label>
							  <div class="controls">
                              <input type="email" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="email" value="{{$user->email}}">
							  </div>
							</div>
							
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file" name="image"><span class="filename" style="user-select: none;">No file selected</span><span class="action" style="user-select: none;">Choose File</span></div>
							  </div>
							</div>
							
							<div class="control-group hidden-phone">
								<label class="control-label" for="textarea2">About:</label>
								<div class="controls">
								  <textarea id="summary-ckeditor" rows="3" name="about">{{$user->about}}</textarea>
								</div>
							  </div>
                                  

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>
@endsection
@push('js')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endpush