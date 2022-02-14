$(function () {
    $("#add_form").validate({
        rules: {
            verification_status: {
                required: true
            }           
           
           
        },
      /*  messages: {
            phone: {
                minlength: 'Phone number must have 10 digits.',
                maxlength: 'Phone number should not exceed 10 digits.'
            }
        },*/
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
            verification_status: {
                required: true
            },
           
          
        },
      /*  messages: {
            phone: {
                minlength: 'Phone number must have 10 digits.',
                maxlength: 'Phone number should not exceed 10 digits.'
            }
        },*/
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