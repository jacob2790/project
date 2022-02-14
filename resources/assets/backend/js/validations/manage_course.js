$(function () {
    $("#add_form").validate({
        rules: {
            course_title: {
                required: true
            },

            subject: {
                required: true
            },

            video_url: {
                required: true
            },

            lecturer_id: {
                required: true
            },

            credit_unit: {
                required: true,digits:true,
            },

            course_code: {
                required: true
            },
            sef_url: {
                required: true
            },
            course_duration: {
                required: true
            },
            course_fee: {
                required: true
            },
            description: {
                required: true
            },
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            //$('#add_button_slider').prop('disabled', 'disabled');
           // block_page();
            form.submit();
        }
    });
    $("#update_form_video").validate({
        rules: {
            homepage_video: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#update_button_video').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
    $("#update_form_homepage_element").validate({
        rules: {
            title_1: {
                required: true
            },
            title_2: {
                required: true
            },
            title_3: {
                required: true
            },
            sub_title_1: {
                required: true
            },
            sub_title_2: {
                required: true
            },
            sub_title_3: {
                required: true
            },
            url_1: {
                required: true
            },
            url_2: {
                required: true
            },
            url_3: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#update_button_homepage_element').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });


     $("#update_form_sitecc").validate({
        rules: {
             course_title: {
                required: true
            },

            subject: {
                required: true
            },

            video_url: {
                required: true
            },

            lecturer_id: {
                required: true
            },

            credit_unit: {
                required: true,digits:true,
            },

            course_code: {
                required: true
            },
            sef_url: {
                required: true
            },
            course_duration: {
                required: true
            },
            course_fee: {
                required: true
            },
            description: {
                required: true
            },
        },
       /* messages: {
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