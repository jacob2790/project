var hierarchy_select = $('#hierarchy_select').comboTree({
    source: categories_json,
    isMultiple: true,
    cascadeSelect: true,
    selected: selected_categories
});

// set the parent_id hidden field with the selected category id
$('.comboTreeItemTitle').on('click', function () {
    $('#category_ids').val(hierarchy_select.getSelectedIds());
});

$(function () {
    $('#brand').on('keyup', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });
        $.ajax({
            url: sef_url_route,
            method: 'post',
            data: {
                brand: $(this).val()
            },
            success: function (result) {
                console.log($('#sef_url').val(result.sef_url));
            }
        });
    });

    if ($('.tags-input').length > 0)
        $('.tags-input').tagsInput();
});
