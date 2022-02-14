$(function () {
    $('#add_info').hide();
    $('#edit_info').hide();
    $('#kt_portlet_add').hide();
    $('#kt_portlet_update').hide();
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
        var name = $.trim($('.item_name_' + id).html());
        var image = $.trim($('.item_image_' + id).val());
        var image_view = $('.edit_image');
        var image_src = image_view.attr('data-content');

        $('.edit_id').val(id);
        $('.edit_name').val(name);
        image_view.attr('src', image_src + image);
        $('.edit_image_button').attr('data-content', '<img class="popover-img" src="' + image_src + image + '" />');

        $('#kt_portlet_add').hide();
        $('#add_info').hide();

        $('#kt_portlet_update').show();
        $('#edit_info').show();
        $('#separator_line').show();
        KTUtil.scrollTop();
    });
});