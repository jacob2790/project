$(function () {
    // import products
    $("#import_form").validate({
        rules: {
            excel_file: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            // KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#import_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // add product basic info
    $("#add_form_basic_info").validate({
        rules: {
            category_ids: {
                required: true
            },
            brand_id: {
                required: true, digits: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#add_button_basic_info').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // edit product basic info
    $("#update_form_basic_info").validate({
        rules: {
            category_ids: {
                required: true
            },
            brand_id: {
                required: true, digits: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#update_button_basic_info').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // edit main product details
    $("#update_form_main_product_details").validate({
        rules: {
            title: {
                required: true
            },
            price: {
                required: true, number: true
            },
            cost_price: {
                required: true, number: true
            },
            description: {
                required: true
            },
            weight: {
                number: true
            },
            length: {
                number: true
            },
            width: {
                number: true
            },
            height: {
                number: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            KTUtil.scrollTop($("#update_form_main_product_details").offset().top + -200);
        },

        submitHandler: function (form) {
            $('#update_button_main_product_details').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // add product variant
    $("#add_form_product_variant").validate({
        rules: {
            variant: {
                required: true
            },
            variant_values: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            // KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#add_button_product_variant').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // edit product details
    $("#update_form_product_details").validate({
        rules: {
            // 'price[]': 'required',
            // 'description[]': 'required'
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            if (current_section.length > 0)
                KTUtil.scrollTop(($('#kt_portlet_' + current_section).offset().top) + -200);
        },

        submitHandler: function (form) {
            $('#update_button_product_details').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // edit product variant
    $("#update_form_product_attribute").validate({
        rules: {
            attribute_set_id: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            if (current_section.length > 0)
                KTUtil.scrollTop(($('#kt_portlet_' + current_section).offset().top) + -200);
        },

        submitHandler: function (form) {
            $('#update_button_product_attribute').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // edit related products
    $("#update_form_related_products").validate({
        rules: {},

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            // KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            $('#update_button_related_products').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });

    // edit seo info
    $("#update_form_seo_info").validate({
        rules: {},

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            if (current_section.length > 0)
                KTUtil.scrollTop(($('#kt_portlet_' + current_section).offset().top) + -200);
        },

        submitHandler: function (form) {
            $('#update_button_seo_info').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});