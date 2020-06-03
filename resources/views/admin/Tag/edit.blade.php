@extends('layouts.backend.app')
@section('title', 'ADMIN')
@push('cs')
@endpush
@section('content')
<div class="row-fluid sortable ui-sortable">
				<div class="box span12">
					<a href="{{route('admin.tag.index')}}" class="btn btn-sm btn-primary pull-right">Edit Tag</i></a>
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						
					</div>
					<div class="box-content">
					<form class="form-horizontal" action="{{route('admin.tag.update',$tag->id)}}" method="post">
						@csrf
						@method('PUT')
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tag Name: </label>
							  <div class="controls">
							  <input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" name="name" value="{{$tag->name}}">
								
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