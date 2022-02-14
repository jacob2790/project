$(function () {
    $('#kt_portlet_add').hide();
    $('#kt_portlet_update').hide();
    $('#add_info').hide();
    $('#edit_info').hide();
    $('#separator_line').hide();

    $('#add_new_button').on('click', function () {
        $('#kt_portlet_update').hide();
        $('#edit_info').hide();

        $('#kt_portlet_add').show();
        $('#add_info').show();
        $('#separator_line').show();
        KTUtil.scrollTop();
    });

    $('.edit_button').on('click', function () {
        var id = $(this).attr('data-content');
        var title = $.trim($('.item_title_' + id).html());

        $('.edit_id').val(id);
        $('.edit_title').val(title);

        $('#kt_portlet_add').hide();
        $('#add_info').hide();

        $('#kt_portlet_update').show();
        $('#edit_info').show();
        $('#separator_line').show();
        KTUtil.scrollTop();
    });
});