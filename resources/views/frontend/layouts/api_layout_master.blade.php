<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="{{ URL::asset('resources/assets/frontend/bootstrap/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ URL::asset('resources/assets/frontend/assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/frontend/assets/css/media.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/frontend/assets/css/oompi-mcle.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/frontend/assets/css/owl.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/frontend/assets/css/glyphicons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('resources/assets/frontend/assets/css/custom.css') }}">

</head>
<body>

<!-- begin:: Header -->
<!-- end:: Header -->
<!-- begin:: Header Menu -->
<!-- end:: Header Menu -->
<!-- Page Content --> 
<!-- begin:: Content -->
@yield('content')
<!-- end:: Content -->
<!-- begin:: Footer -->

<!-- end:: Footer -->
<!-- Bootstrap core JavaScript --> 
<script src="{{ URL::asset('resources/assets/frontend/bootstrap/jquery/jquery.min.js') }}"></script> 
<script src="{{ URL::asset('resources/assets/frontend/bootstrap/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
<!-- Additional Scripts --> 
<script src="{{ URL::asset('resources/assets/frontend/assets/js/custom.js') }}"></script> 
<script src="{{ URL::asset('resources/assets/frontend/assets/js/owl.js') }}"></script> 
<script src="{{ URL::asset('resources/assets/frontend/assets/js/slick.js') }}"></script> 
<script src="{{ URL::asset('resources/assets/frontend/assets/js/accordions.js') }}"></script> 
<script src="{{ URL::asset('resources/assets/frontend/js/bootbox/bootbox.min.js') }}"></script>
<script  src="{{ URL::asset('resources/assets/frontend/js/jquery.validate.min.js') }}"></script>

    @yield('scripts')
</body>
</html>