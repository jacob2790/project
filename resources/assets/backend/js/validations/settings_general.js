$(function () {
    $("#update_form_site").validate({
        rules: {
            homepage_title: {
                required: true
            },
            homepage_keywords: {
                required: true
            },
            homepage_description: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#update_button_site').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
    $("#update_form_contact_info").validate({
        rules: {
            store_name: {
                required: true
            },
            
             forum_name: {
                required: true
            },

            contact_email: {
                required: true, email: true
            },
            contact_phone: {
                required: true, digits: false
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#update_button_contact_info').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
    $("#update_form_store_address").validate({
        rules: {
            legal_business_name: {
                required: true
            },
            phone: {
                required: true, digits: false
            },
            address_1: {
                required: true
            },
            address_2: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            zip_code: {
                required: true, digits: true
            },
            country: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#update_button_store_address').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
    $("#update_form_exhibition").validate({
        rules: {
            summary: {
                required: true
            },
            url: {
                required: true
            },
            date: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
            //KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#update_button_exhibition').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
    $("#add_form_exhibition").validate({
        rules: {
            summary: {
                required: true
            },
            url: {
                required: true
            },
            date: {
                required: true
            }
        },
        //display error alert on form submit
        invalidHandler: function (event, validator) {
           //KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            console.log(form);
            $('#add_button_exhibition').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});