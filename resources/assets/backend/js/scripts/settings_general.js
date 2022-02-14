if (current_section.length > 0)
    KTUtil.scrollTop(($('#kt_portlet_' + current_section).offset().top) + -100);

$(function () {
    $('#add_form_exhibition').show();
    $('#update_form_exhibition').hide();

    $('.edit_exhibition').on('click', function () {
        var id = $(this).attr('data-content');
        var summary = $.trim($('.item_summary_' + id).html());
        var url = $.trim($('.item_url_' + id).html());
        var date = $.trim($('.item_date_' + id).html());

        $('.edit_id').val(id);
        $('.edit_summary').val(summary);
        $('.edit_url').val(url);
        $('.edit_date').val(date);

        $('#add_form_exhibition').hide();
        $('#update_form_exhibition').show();
        KTUtil.scrollTop($(document).height());
    });
});
