$(function () {
    $("#add_form").validate({
        rules: {
            title: {
                required: true
            },
            message: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#app_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});