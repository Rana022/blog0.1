@extends('layouts.backend.app')
@section('title', 'INFO EDIT')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<a href="{{route('admin.basic.index')}}" class="btn btn-sm btn-primary pull-right">back</i></a>
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						
					</div>
					<div class="box-content">
					<form class="form-horizontal" action="{{route('admin.basic.update',$basic->id)}}" method="post">
						@csrf
						@method('PUT')
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Blog Name: </label>
							  <div class="controls">
							  <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="blog_name" value="{{$basic->blog_name}}">	
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="typeahead">Welcome Speech: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="welcome_speech" value="{{$basic->welcome_speech}}">	
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="typeahead">Address: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="address" value="{{$basic->address}}">	
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="typeahead">Contact: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="contact" value="{{$basic->contact}}">	
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="typeahead">Email: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="email" value="{{$basic->email}}">	
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="typeahead">Facebook: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="facebook" value="{{$basic->facebook}}">	
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="typeahead">Linkedin: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="linkedin" value="{{$basic->linkedin}}">	
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="typeahead">Twitter: </label>
								<div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="twitter" value="{{$basic->twitter}}">	
								</div>
							  </div>

							  <div class="control-group hidden-phone">
								<label class="control-label" for="textarea2">Slogan:</label>
								<div class="controls">
								  <textarea id="summary-ckeditor" rows="3" name="slogan">{!!$basic->slogan!!}</textarea>
								</div>
							  </div>
							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>
@endsection
@push('js')
 
@endpush