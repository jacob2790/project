var hierarchy_select = $('#hierarchy_select').comboTree({
    source: categories_json,
    isMultiple: false,
    disableSpecificItem: true,
    selected: [selected_parent_category]
});

// set the parent_id hidden field with the selected category id
$('.comboTreeItemTitle').on('click', function () {
    $('#parent_id').val(hierarchy_select.getSelectedIds());
});

$(function () {
    $('#category').on('keyup', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });
        $.ajax({
            url: sef_url_route,
            method: 'post',
            data: {
                category: $(this).val()
            },
            success: function (result) {
                console.log($('#sef_url').val(result.sef_url));
            }
        });
    });

    if ($('.tags-input').length > 0)
        $('.tags-input').tagsInput();
});
