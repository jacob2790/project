 <?php $question_data = fetch_Questionoftheday_data();



  ?>
<div class="sub-header">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-xs-12 hiddenmb">
        <ul class="left-info">
          <li><a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> {{$contact_info['contact_phone']}}</a></li>
          <li><a href="mailto:<?php echo $contact_info['contact_email']?>"><i class="fa fa-envelope"></i> {{$contact_info['contact_email']}}</a></li>
        </ul>
      </div>
      @if(empty(Auth::user()->id))
        <div class="col-md-4 text-right"> 
        <a href="{{ route('login') }}" class="signup-button">LOGIN</a>&nbsp; 
        <a href="{{ route('customer_register') }}" class="signup-button-1 ">Sign up</a> 
      </div>       

      @else  

<div class="col-md-4 text-right"> 
<div class=" text-right user-guest">
<button class="btn btn-primary-lang dropdown-toggle dropdownbutton" type="button"
data-toggle="dropdown" aria-expanded="true">
Welcome {{ Auth::user()->first_name }} 
<span class="caret"></span>
</button>
<ul class="dropdown-menu" x-placement="bottom-start"
style="position: absolute; transform: translate3d(15px, 110px, 0px); top: 0px; left: 0px; will-change: transform;">
<li><a href="{{ route('user_profile_update') }}">My Account</a></li><br>
<li><a href="{{ route('user_order_list') }}">My Courses</a></li><br>
@if(!empty($question_data['QuestionOfTheDay']))
<li><a data-toggle="modal" href="#exampleModal">Question of The Day</a></li><br>
@endif


<li><a href="{{ route('user_change_password') }}">Change Password</a></li><br>
<li><a href="{{ route('logout') }}">Logout</a></li>
</ul>
</div>
 </div>
    @endif
    </div>
  </div>
</div>

@if(!empty($question_data['QuestionOfTheDay']))
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999!important;background-color: #3f423f80;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:120px;border: 2px solid #964dce">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Question of the day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$question_data['QuestionOfTheDay']['question']}}
      </div>
      <div class="modal-footer">
        <button type="button" class="popupmodel-btn-secondary" data-dismiss="modal">Close</button>
       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
@endif
@section('scripts')
@endsection

