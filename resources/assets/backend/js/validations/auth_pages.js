$(function () {    
    $("#login_form").validate({
        rules: {
            email: {
                required: true, email: true
            },
            password: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#login_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    $("#forgot_password_form").validate({
        rules: {
            email: {
                required: true, email: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#forgot_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    $("#password_form").validate({
        rules: {
            new_password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#password_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});