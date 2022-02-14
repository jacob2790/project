<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 footer-item pb-4">
        <div class="space-bottom"><img src="{{ URL::asset('resources/assets/frontend/assets/images/Oompi-logo-2.png') }}" width="160" height="45" alt=""></div>
        <div class="footer-about-us"><p>Online On-demand MCLE Philippines, Inc. (OOMPI) offers the easiest and most convenient way to stay abreast with the latest and most relevant MCLE topics.  With its simple, easy-to-navigate learning portal, you can learn on the go using any device.</p></div>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-6 footer-item pb-4">
        <h4></h4>
        <ul class="menu-list">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="{{ route('courses') }}">Courses</a></li>
          <li><a href="{{ route('faq') }}">FAQ </a></li>
          <li><a href="{{ route('lecturers') }}">Lecturers</a></li>
          <li><a href="{{ route('privacy_statement') }}">Privacy Policy</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 footer-item pb-4">
        <h4>Social</h4>
        @php
        $facebook_url = isset($contact_info['facebook_url']) ? $contact_info['facebook_url'] : 'javascript:;';
        $facebook_target = isset($contact_info['facebook_url']) ? '_blank' : '_self';
        $twitter_url = isset($contact_info['twitter_url']) ? $contact_info['twitter_url'] : 'javascript:;';
        $twitter_target = isset($contact_info['twitter_url']) ? '_blank' : '_self';
        $instagram_url = isset($contact_info['instagram_url']) ? $contact_info['instagram_url'] : 'javascript:;';
        $instagram_target = isset($contact_info['instagram_url']) ? '_blank' : '_self';
        $youtube_url = isset($contact_info['youtube_url']) ? $contact_info['youtube_url'] : 'javascript:;';
        $youtube_target = isset($contact_info['youtube_url']) ? '_blank' : '_self';


        @endphp
        <ul class="menu-list menu-listi">
          @if($twitter_url == "javascript:;")
           <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-twitter"></i>Twitter</a></li>        
        @else
         <li><a href="{{ $twitter_url }}" target="{{ $twitter_target }}"><i class="fa fa-twitter"></i>Twitter</a></li>        
        @endif



        @if($instagram_url == "javascript:;")
        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-instagram"></i>Instagram</a></li> 
        @else
        <li><a href="{{ $instagram_url }}" target="{{ $instagram_target }}"><i class="fa fa-instagram"></i>Instagram</a></li>      
        @endif


        @if($facebook_url == "javascript:;")
        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-facebook-square"></i>Facebook</a></li>
        @else
        <li><a href="{{ $facebook_url }}" target="{{ $facebook_target }}"><i class="fa fa-facebook-square"></i>Facebook</a></li>
        @endif


         @if($youtube_url == "javascript:;")
        <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-youtube-play"></i>YouTube</a></li>
        @else
        <li><a href="{{ $youtube_url }}"target="{{ $youtube_target }}"><i class="fa fa-youtube-play"></i>YouTube</a></li>
        @endif




        </ul>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 footer-item last-item pb-4">
        <h4>Contact Us</h4>
        <ul class="menu-list menu-listi-1 contactli">
          <li><i class="fa fa-map-marker"></i><strong>OOMPI</strong><br>
            Unit 1106 Antel Corporate<br> Building,
           Valero Street,<br>
            Makati City<br>   
          </li>
          <li><a href="mailto:<?php echo $contact_info['contact_email']?>"><i class="fa fa-envelope-o"></i>{{$contact_info['contact_email']}}</a></li>
          <li><a href="#"><i class="fa fa-phone"></i>{{$contact_info['contact_phone']}}</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<div class="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Copyright © {{ date('Y') }} <a rel="nofollow noopener" href="https://www.oompi-mcle.com.com" target="_blank">Oompi-mcle.com</a> - All Rights Reserved. </p>


      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top: 200px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>         
        </div>
        <div class="modal-body">
          <p style="color:#333!important;text-align: center;">No account linked at this time</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>