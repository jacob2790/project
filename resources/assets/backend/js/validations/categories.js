$(function () {
    $("#add_form").validate({
        rules: {
            category: {
                required: true
            },
            parent_id: {
                required: true, digits: true
            },
            image: {
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
            category: {
                required: true
            },
            parent_id: {
                required: true, digits: true
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