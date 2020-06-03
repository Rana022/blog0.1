<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <style>
        .mytxa{
            background-color: #F8F9FA;
            resize: none;
            border: none;
            border-radius: 5px;
        }
    </style>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/frontend/css/open-iconic-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/icomoon.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
@stack('cs')
    <!-- Styles -->
    
</head>
<body>
@include('layouts.frontend.partial.navbar')
<section class="ftco-section">
@yield('content')
</section>
@include('layouts.frontend.partial.footer')

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="{{asset('assets/frontend/js/jquery.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/jquery-migrate-3.0.1.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/popper.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/jquery.easing.1.3.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/jquery.waypoints.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/jquery.stellar.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/aos.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/jquery.animateNumber.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/scrollax.min.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="https://use.fontawesome.com/c564c6262b.js"></script>
<script src="{{asset('assets/frontend/js/google-map.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script src="{{asset('assets/frontend/js/main.js')}}" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="6b684cea29124212fda53b8b-text/javascript"></script>
<script type="6b684cea29124212fda53b8b-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="{{asset('assets/frontend/js/rocket-loader.min.js')}}" data-cf-settings="6b684cea29124212fda53b8b-|49" defer=""></script></body>
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
        <script src="{{ asset('js/share.js') }}"></script>
@stack('js')
    </body>
</html>
