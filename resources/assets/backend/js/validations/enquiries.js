$(function () {
    $("#add_form").validate({
        rules: {
            message: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            // KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            console.log(form);
            $('#add_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    $("#update_status").validate({
        rules: {
            enquiry_status: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#update_status_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});