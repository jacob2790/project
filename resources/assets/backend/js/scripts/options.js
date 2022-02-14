$(function () {
    $('.edit_option').on('click', function () {
        var old_variant = $(this).attr('data-content');
        var variant = old_variant;

        $('#old_variant').val(old_variant);
        $('#variant').val(variant);
    });
});