if (selected_categories.length > 0) {
    var selected_categories_array = selected_categories.split(',');
    for (var i = 0; i < selected_categories_array.length; i++)
        single_selected_ids.push(selected_categories_array[i]);
}

$(function () {
    // reset all featured checkbox status before displaying th popup page
    $('.choose_products').on('click', function () {
        var category_id = $(this).attr('id');
        var url = $('.check_' + category_id + ':first').attr('data-url');
        $('.check_' + category_id).attr('src', url + '/unchecked.png')
        if ($('#hidden_featured_' + category_id).length > 0) {
            var featured_products = $('#hidden_featured_' + category_id).val();
            var featured_products_array = featured_products.split(',');
            for (var i = 0; i < featured_products_array.length; i++) {
                var product_id = featured_products_array[i];
                $('#product_' + product_id).attr('src', url + '/checked.png')
            }
        }
    });

    $('.check_img').on('click', function () {
        var checked = $(this).hasClass('checked');
        var url = $(this).attr('data-url');
        if (checked) {
            $(this).removeClass('checked')
            $(this).attr('src', url + '/unchecked.png')
        } else {
            $(this).addClass('checked')
            $(this).attr('src', url + '/checked.png')
        }
    });
});

function set_featured_records(url) {
    swal.fire({
        title: 'Are you sure you want to set multiple categories as featured?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, set featured!'
    }).then(function (result) {
        if (result.value) {
            $('#set_featured_records').prop('disabled', 'disabled');
            block_page();
            window.location.replace(url + single_selected_ids);
        }
    });
}

function set_featured_product_records(url, category_id) {
    var product_ids = '';
    $('.check_' + category_id).each(function () {
        var checked = $(this).hasClass('checked');
        if (checked) {
            if (product_ids.length > 0)
                product_ids += ',';
            var product_id = $(this).attr('data-id');
            product_ids += product_id;
        }
    });

    //if (product_ids.length > 0) {
    swal.fire({
        title: 'Are you sure you want to set multiple products as featured?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, set featured!'
    }).then(function (result) {
        if (result.value) {
            $('#set_featured_product_records').prop('disabled', 'disabled');
            block_page();
            window.location.replace(url + product_ids);
        }
    });
    // } else {
    //     swal.fire(
    //         'Please select at least one product as featured.',
    //         '',
    //         'info'
    //     )
    // }
}