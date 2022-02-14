$(function () {
    $("#update_form").validate({
        rules: {
            variant: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#update_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});