$(function () {
    $("#add_form").validate({
        rules: {
            brand: {
                required: true
            },
            logo: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            console.log(form);
            $('#add_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    $("#update_form").validate({
        rules: {
            brand: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            console.log(form);
            $('#update_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});