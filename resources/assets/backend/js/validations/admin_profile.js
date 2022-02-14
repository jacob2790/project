$(function () {
    $("#update_form").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#update_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    $("#password_form").validate({
        rules: {
            current_password: {
                required: true
            },
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