var hierarchy_select = $('#hierarchy_select').comboTree({
    source: categories_json,
    isMultiple: true,
    cascadeSelect: true,
    disableSpecificItem: true,
    selected: selected_categories
});

// set the category_ids hidden field with the selected category id
$('.comboTreeItemTitle').on('click', function () {
    $('#category_ids').val(hierarchy_select.getSelectedIds());
});

// set the product_ids hidden field with the selected product id
$('#select2_products').on('change', function () {
    $('#product_details_ids').val($(this).val());
});

$(function () {
    applies_to_change();
    time_limit_change();
    $('input[name="applies_to_what"]').on('change', function () {
        applies_to_change();
    });
    $('input[name="is_time_limit_enabled"]').on('change', function () {
        time_limit_change();
    });
    $('#discount_type_percentage').on('click', function () {
        $('#type').val('Percentage');
    });
    $('#discount_type_fixed_value').on('click', function () {
        $('#type').val('Fixed Value');
    });

    // Ajax call to fetch products based on selected categories
    $('#hierarchy_select').on('change', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });
        $.ajax({
            url: fetch_products_route,
            method: 'post',
            data: {
                categories: hierarchy_select.getSelectedIds()
            },
            success: function (result) {
                // Empty the dropdown
                $('#select2_products').find('option').remove();

                var len = 0;
                if (result['options'] != null) {
                    len = result['options'].length;
                }

                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var id = result['options'][i].id;
                        var title = result['options'][i].title;

                        var option = "<option value='" + id + "'>" + title + "</option>";
                        $("#select2_products").append(option);
                    }
                }
            }
        });
    });
});

function applies_to_change() {
    if ($('#applies_to_product').is(":checked")) {
        $('#applies_to').val('Products');
        $('.product-type').show();
    }
    else {
        $('#applies_to').val('Categories');
        $('.product-type').hide();
    }
}

function time_limit_change() {
    if ($('input[name="is_time_limit_enabled"]').is(":checked"))
        $('.time-limit').show();
    else
        $('.time-limit').hide();
}