$(function () {
    $("#add_form").validate({
        rules: {
            name: {
                required: true
            },
           
            order_list: {
                required: true,number:true,
            },

            image: {
                required: true
            },
           
            bio_note: {
                required: true
            },

           
        },
        messages: {
            order_list: {
                required: 'Please enter order number',
               
            },

             name: {
                required: 'Please enter your name.',
               
            },

            bio_note: {
                required: 'Please enter bio note',
               
            },

             image: {
                required: 'Please select an image.',
               
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
           
            order_list: {
                required: true,number:true,
            },
             bio_note: {
                required: true
            },
        },
     messages: {
            order_list: {
                required: 'Please enter order number',
               
            },

             name: {
                required: 'Please enter your name.',
               
            },
             bio_note: {
                required: 'Please enter bio note',
               
            },
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