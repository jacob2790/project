$(function () {
    $("#add_form_slider").validate({
        rules: {
            slider_image: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#add_button_slider').prop('disabled', 'disabled');
            block_page();
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
});