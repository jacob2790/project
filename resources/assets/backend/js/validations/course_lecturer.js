$(function () {
    $("#add_form").validate({
        rules: {
            name: {
                required: true
            },
           
            phone: {
                required: true, digits: true, minlength: 10, maxlength: 10
            },
            phone2: {
                required: false, digits: true, minlength: 10, maxlength: 10
            },
            email: {
                required: true, email: true
            }
        },
        messages: {
            phone: {
                minlength: 'Phone number must have 10 digits.',
                maxlength: 'Phone number should not exceed 10 digits.'
            },

            phone2: {
                minlength: 'Phone number must have 10 digits.',
                maxlength: 'Phone number should not exceed 10 digits.'
            },
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
            name: {
                required: true
            },
           
            phone: {
                required: true, digits: true, minlength: 10, maxlength: 10
            },
            email: {
                required: true, email: true
            }
        },
        messages: {
            phone: {
                minlength: 'Phone number must have 10 digits.',
                maxlength: 'Phone number should not exceed 10 digits.'
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