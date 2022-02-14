var table_to_export_id = 'table_export';
var table_to_export = document.getElementById(table_to_export_id);

if ($('#' + table_to_export_id).length > 0){
    var instance = new TableExport(table_to_export, {
        filename: 'Products',
        exportButtons: false,
        formats: ['xlsx'],
        ignoreCols: [0, 1, 7, 8]
    });
// instance.remove();
// console.log(typeof TableExport != "undefined");
    var XLS = instance.CONSTANTS.FORMAT.XLSX;
//var CSV = instance.CONSTANTS.FORMAT.CSV;

//                                          // "id"  // format
    var export_data_XLS = instance.getExportData()[table_to_export_id][XLS];
//var export_data_CSV = instance.getExportData()[table_to_export_id][CSV];

// get filesize
    var bytes_XLS = instance.getFileSize(export_data_XLS.data, export_data_XLS.fileExtension);
//var bytes_CSV = instance.getFileSize(export_data_CSV.data, export_data_CSV.fileExtension);

//    console.log('filesize (XLS):', bytes_XLS + 'B');
//console.log('filesize (CSV):', bytes_CSV + 'B');

    var button_XLS = document.getElementById('export_records_xls');
    button_XLS.addEventListener('click', function (e) {
        //                   // data             // mime                 // name                 // extension
        instance.export2file(export_data_XLS.data, export_data_XLS.mimeType, export_data_XLS.filename, export_data_XLS.fileExtension);
    });

// var button_CSV = document.getElementById('export_records_csv');
// button_CSV.addEventListener('click', function (e) {
//     //                   // data             // mime                 // name                 // extension
//     instance.export2file(export_data_CSV.data, export_data_CSV.mimeType, export_data_CSV.filename, export_data_CSV.fileExtension);
// });
}

if (current_section.length > 0)
    KTUtil.scrollTop(($('#kt_portlet_' + current_section).offset().top) + -200);

var hierarchy_select = $('#hierarchy_select').comboTree({
    source: categories_json,
    isMultiple: (typeof selected_category === 'undefined'),
    cascadeSelect: (typeof selected_category === 'undefined'),
    disableSpecificItem: true,
    selected: (typeof selected_categories === 'undefined') ? selected_category : selected_categories
});

// set the category_ids hidden field with the selected category id
$('.comboTreeItemTitle').on('click', function () {
    if ($('#category_ids').length > 0)
        $('#category_ids').val(hierarchy_select.getSelectedIds());
});

// set the collection_ids hidden field with the selected collection id
$('#select2_collection').on('change', function () {
    $('#collection_ids').val($(this).val());
});

// set the related_product_ids hidden field with the selected product id
$('#select2_products').on('change', function () {
    $('#related_product_ids').val($(this).val());
});

$('#attribute_set_id').on('change', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
    });
    $.ajax({
        url: fetch_attributes_route,
        method: 'post',
        data: {
            attribute_set_id: $(this).val()
        },
        success: function (result) {
            $('#attribute_values').show();
            $('#attribute_values').html(result['response']);
        }
    });
});

$(function () {
    $('#attribute_values').hide();
    $(".kt-form__image-upload").on('click', function () {
        $("#image").trigger('click');
    });

    $('#title').on('keyup', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });
        $.ajax({
            url: sef_url_route,
            method: 'post',
            data: {
                title: $(this).val()
            },
            success: function (result) {
                console.log($('#sef_url').val(result.sef_url));
            }
        });
    });

    $('#variant').keyup(function () {
        var query = $.trim($(this).val());
        if (query != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                }
            });
            $.ajax({
                url: autocomplete_variants,
                method: 'post',
                data: {
                    variant: query
                },
                success: function (result) {
                    $('#variant_list').fadeIn();
                    $('#variant_list').html(result);
                }
            });
        }
    });

    $('#variant_list').on('click', 'li', function () {
        $('#variant').val($(this).text());
        $('#variant_list').fadeOut();
    });

    $('#add_button_product_variant').on('click', function (e) {
        $('#add_form_product_variant').submit();
    });

    $('#main_product_image_section').on('click', 'div.kt-form__image-upload-variant', function () {
        $(this).siblings(".image-variant").trigger('click');
    });

    $('#manage_variants_section').on('click', 'div.kt-form__image-upload-variant', function () {
        $(this).siblings(".image-variant").trigger('click');
    });

    $('.variant-image-add-more').on('click', function () {
        var row_class = '.variant-image-container-' + $(this).attr('id');
        var html = $(row_class).children('.variant-image-repeat').first().clone();
        $(row_class).append(html);
    });

    if ($('.tags-input').length > 0)
        $('.tags-input').tagsInput();

    if ($('.tags-input-readonly').length > 0) {
        $('.tags-input-readonly').tagsInput({
            'interactive': false,
            'readonly': true
        });
    }
});
