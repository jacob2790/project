if (current_section.length > 0)
    KTUtil.scrollTop(($('#kt_portlet_' + current_section).offset().top) + -100);

$(function () {
    $(".kt-form__image-upload").on('click', function () {
        $("#slider_image").trigger('click');
    });

    $('.theme-checkbox').on('change', function () {
        $('.theme-checkbox').not(this).prop('checked', false);
        if ($(this).is(":checked")) {
            $('#enabled_theme').val($(this).prop('id'));
        }
        else {
            $('#enabled_theme').val('');
        }
    });
});
