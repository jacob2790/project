@extends('backend.layouts.admin_login')
<?php //dd(auth::user())?>
@section('content')
 @include('backend.layouts.includes.alert_popup')
    <div class="kt-login__signin">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Sign In To Admin</h3>
        </div>    
     {!! Form::open(array('route'=>('admin_login') , 'class' => 'kt-form','id'=>'login_form','enctype'=>'multipart/form-data','method'=>'POST','type'=>'file')) !!} 
    <!-- Messages section -->
        @if(!isset($current_section))
           
        @endif
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
        </div>
        <div class="input-group input-addon-right">
            <input class="form-control" type="password" placeholder="Password" name="password">
            <i class="fa fa-eye show-hide"></i>
        </div>
        <div class="row kt-login__extra">
            <div class="col">
            </div>
            <div class="col kt-align-right">
                <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
            </div>
        </div>
        <div class="kt-login__actions">
            <button type="submit" id="login_button" class="btn btn-brand btn-pill kt-login__btn-primary">
                Sign In
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <div class="kt-login__forgot">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Forgotten Password ?</h3>
            <div class="kt-login__desc">Enter your email to reset your password:</div>
        </div>
    {!! Form::open(['url' => $url_prefix . '/reset/password/link', 'id' => 'forgot_password_form', 'class' => 'kt-form', 'method' => 'POST']) !!} 
    <!-- Messages section -->
        @if(isset($current_section))
        @endif
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email"
                   autocomplete="off">
        </div>
        <div class="kt-login__actions">
            <input type="submit" id="forgot_button" class="btn btn-brand btn-pill kt-login__btn-primary">
            </input>&nbsp;&nbsp;
            <button id="kt_login_forgot_cancel"
                    class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- END FORGOT PASSWORD FORM -->
@endsection
@section('scripts')
    <script type="text/javascript">
        var current_section = '{{ isset($current_section) ? $current_section : '' }}';
    </script>
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ URL::asset('resources/assets/backend/js/scripts/auth_pages.js') }}"
            type="text/javascript"></script>
    <script src="{{ URL::asset('resources/assets/backend/js/validations/auth_pages.js') }}"
            type="text/javascript"></script>
    <!--end::Page Scripts -->
@endsection