console.log(current_section);
if (current_section.length > 0){
    if(current_section == 'forgot_password') {
        $('#kt_login').removeClass('kt-login--signin');
        $('#kt_login').removeClass('kt-login--signup');

        $('#kt_login').addClass('kt-login--forgot');
        KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');
    }
}