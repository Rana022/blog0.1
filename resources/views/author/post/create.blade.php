@extends('layouts.backend.app')
@section('title', 'Author')
@push('cs')
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush
@section('content')

<div class="row-fluid sortable">
    <div class="box span12">
		<a href="{{route('author.post.index')}}" class="btn btn-sm btn-primary pull-right">Post</i></a>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Create Post</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
      {{-- article form here --}}
        <div class="box-content">
			<form class="form-horizontal" method="post" action="{{route('author.post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                  <label class="control-label" for="title">Title </label>
                  <div class="controls">
                    <input type="text" class="span6" name="title">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="selectError1">Category:</label>
                  <div class="controls">
                    <select id="selectError1" data-rel="chosen" name="categories[]" multiple>
						@foreach ($categories as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
					 @endforeach
                    </select>
                  </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="selectError2">Tags:</label>
                    <div class="controls">
                      <select id="selectError2" data-rel="chosen" name="tags[]" multiple>
						@foreach ($tags as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
                      </select>
                    </div>
                    </div>

                   <div class="control-group">
                     <div class="controls">
                      <label class="checkbox inline">
                        <div class="checker">
                          <span class="checked">
                           <input type="checkbox" value="1" name="status">
                           </span>
                        </div>Status
                        </label>
                     </div>
                   </div>

  

                <div class="control-group">
                  <label class="control-label">File input</label>
                  <div class="controls">
                    <input class="input-file uniform_on" type="file" name="image">
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Body:</label>
                  <div class="controls">
                    <textarea id="summary-ckeditor" rows="3" name="body"></textarea>
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
            </form>   
        </div>
      {{-- article form end --}}
    </div><!--/span-->
</div><!--/row-->
@endsection
@push('js')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endpush