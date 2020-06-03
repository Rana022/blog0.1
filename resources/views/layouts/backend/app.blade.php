<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
<link id="bootstrap-style" href="{{asset('assets/backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('assets/backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
	<!-- end: CSS -->
	<link rel="shortcut icon" href="{{asset('assets/backend/img/favicon.ico')}}">
	<!-- end: Favicon -->
	@stack('cs')
</head>
<!-- body -->
<body>
		<!-- start: Header -->
	@include('layouts.backend.partial.header')
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
            <!-- start: Main Menu -->
	@include('layouts.backend.partial.sidebar')
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">

			@yield('content')
			

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
    
	@include('layouts.backend.partial.footer')
    
	<!-- start: JavaScript-->

		<script src="{{asset('assets/backend/js/jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.ui.touch-punch.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/modernizr.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.cookie.js')}}"></script>
	
		<script src='{{asset('assets/backend/js/fullcalendar.min.js')}}'></script>
	
		<script src='{{asset('assets/backend/js/jquery.dataTables.min.js')}}'></script>

		<script src="{{asset('assets/backend/js/excanvas.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery.flot.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery.flot.pie.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery.flot.stack.js')}}"></script>
	<script src="{{asset('assets/backend/js/jquery.flot.resize.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.chosen.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.uniform.min.js')}}"></script>
		
		<script src="{{asset('assets/backend/js/jquery.cleditor.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.noty.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.elfinder.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.raty.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.iphone.toggle.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.uploadify-3.1.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.gritter.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.imagesloaded.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.masonry.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.knob.modified.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/jquery.sparkline.min.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/counter.js')}}"></script>
	
		<script src="{{asset('assets/backend/js/retina.js')}}"></script>

		<script src="{{asset('assets/backend/js/custom.js')}}"></script>
        <script src="https://use.fontawesome.com/c564c6262b.js"></script>
		<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
		{!! Toastr::message() !!}
		<script>
        @if($errors->any())
          @foreach($errors->all() as $error)
             toastr.error('{{$error}}', 'error',{
                 progressBar: true,
                 closeButton: true,
             });
             @endforeach
        @endif
        
		</script>
		<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'summary-ckeditor' );
        </script>
	@stack('js')
	<!-- end: JavaScript-->
	
</body>
</html>
