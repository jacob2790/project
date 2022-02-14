$(function () {
    $("#add_form").validate({
        rules: {
            title: {
                required: true
            },
            value: {
                required: true,
                max: function (element) {
                    if ($('#discount_type_percentage').is(":checked")) {
                        return 100;
                    }
                }
            },
            category_ids: {
                required: true
            },
            begin_date: {
                required: function (element) {
                    if ($('input[name="is_time_limit_enabled"]').is(":checked")) {
                        return true;
                    }
                }
            },
            end_date: {
                required: function (element) {
                    if ($('input[name="is_time_limit_enabled"]').is(":checked")) {
                        return true;
                    }
                },
                greaterThan: function (element) {
                    if ($('input[name="is_time_limit_enabled"]').is(":checked")) {
                        return "#begin_date"
                    }
                }
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            // KTUtil.scrollTop();
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
            title: {
                required: true
            },
            value: {
                required: true,
                max: function (element) {
                    if ($('#discount_type_percentage').is(":checked")) {
                        return 100;
                    }
                }
            },
            category_ids: {
                required: true
            },
            begin_date: {
                required: function (element) {
                    if ($('input[name="is_time_limit_enabled"]').is(":checked")) {
                        return true;
                    }
                }
            },
            end_date: {
                required: function (element) {
                    if ($('input[name="is_time_limit_enabled"]').is(":checked")) {
                        return true;
                    }
                },
                greaterThan: function (element) {
                    if ($('input[name="is_time_limit_enabled"]').is(":checked")) {
                        return "#begin_date"
                    }
                }
            }
        },

        //display error alert on form submit
        invalidHandler: function (event, validator) {
            // KTUtil.scrollTop();
        },

        submitHandler: function (form) {
            console.log(form);
            $('#update_button').prop('disabled', 'disabled');
            block_page();
            form.submit();
        }
    });
});