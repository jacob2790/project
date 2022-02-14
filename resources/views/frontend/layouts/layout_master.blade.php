<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
 @if(isset($homepage_title))
        <title>{{ $homepage_title }}</title>
    @else
        <title>{{ config('app.site_title') }}{{ isset($page_title) ? ' : ' . $page_title : ''}}</title>
    @endif
    @if(isset($homepage_keywords))
        <meta name="keywords" content="{{ $homepage_keywords }}">
    @else
        <meta name=" keywords" content="{{ isset($meta_keywords) ? $meta_keywords : ''}}">
    @endif
    @if(isset($homepage_description))
        <meta name="description" content="{{ $homepage_description }}">
    @else
        <meta name="description" content="{{ isset($meta_description) ? $meta_description : ''}}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}" />
     <link rel="shortcut icon" href="{{ URL::asset('resources/files/uploads/logos/favicon.png') }}"/>
    <link rel="icon" href="{{ URL::asset('resources/files/uploads/logos/favicon.png') }}" type="image/x-icon"/>

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
 @yield('styles')
    <?php $header_data = fetch_header_data(); ?>
    @if($header_data['google_analytics'] != null && !empty($header_data['google_analytics']))
        {!! $header_data['google_analytics'] !!}
    @endif
</head>
<body>
@php $contact_info = fetch_contact_info(); @endphp
<!-- begin:: Header -->
@include('frontend.layouts.includes.header_section')
<!-- end:: Header -->
<!-- begin:: Header Menu -->
@include('frontend.layouts.includes.header_menu_section')
<!-- end:: Header Menu -->
<!-- Page Content --> 
<!-- begin:: Content -->
@yield('content')
<!-- end:: Content -->
<!-- begin:: Footer -->
@include('frontend.layouts.includes.footer_section')
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

<script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

<script type="text/javascript">
$(document).ready(function() {
// show the alert
setTimeout(function() {
$(".alert").alert('close');
}, 10000);
});
</script>

    @yield('scripts')
</body>
</html>