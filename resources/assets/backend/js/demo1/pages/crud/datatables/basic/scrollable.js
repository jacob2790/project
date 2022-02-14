"use strict";
var selected_ids = [];
var single_selected_ids = [];
var KTDatatablesBasicScrollable = function () {

    var initTable1 = function () {
        // var table = $('#kt_table_1');
        var table1 = $('.table-listing-with-checkbox');

        // begin first table
        table1.DataTable({
            pagingType: 'full_numbers',
            lengthMenu: [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
            pageLength: 20,
            // scrollY: '50vh',
            // scrollX: true,
            // scrollCollapse: true,
            "order": [], //disable initial sorting
            // "order": [[2, 'asc']], // sort by first column after checkbox
            // fixedColumns: {
            //     leftColumns: 2
            // },
            "columnDefs": [
                {
                    // disable sorting for the below column indices
                    'orderable': false,
                    'targets': [0, $('.table-listing tr th').length - 1] // first and last columns
                }
            ],
            // "drawCallback": function (settings) {
            //     if ($.isFunction(window.init_table_export_products)) {
            //         if (instance_export_product != null) {
            //             console.log('in scroll');
            //             instance_export_product = null;
            //             button_XLS.removeEventListener('click', null);
            //             console.log(instance_export_product);
            //         }
            //         init_table_export_products();
            //     }
            // }
        });

        // header checkbox check event
        $('.kt-portlet__body').on('change', '.kt-group-checkable', function () {
            var set = table1.find('td:first-child .kt-checkable');
            var checked = $(this).is(':checked');
            selected_ids = [];

            $(set).each(function () {
                if (checked) {
                    selected_ids.push($(this).val());
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                }
                else {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                }
            });
        });

        // individual checkbox check event
        table1.on('change', 'tbody tr .kt-checkable', function () {
            if ($(this).is(":checked")) {
                selected_ids.push($(this).val());
            }
            else {
                var idx = $.inArray($(this).val(), selected_ids);
                if (idx !== -1) {
                    selected_ids.splice(idx, 1);
                }
            }
            $(this).parents('tr').toggleClass('active');
        });
    };

    var initTable2 = function () {
        var table2 = $('.table-listing-without-checkbox');

        // begin first table
        table2.DataTable({
            bPaginate: false,
            // scrollY: '50vh',
            // scrollX: true,
            // scrollCollapse: true,
            "order": [], //disable initial sorting
            // "order": [[1, 'asc']], // sort by first column after checkbox
            "columnDefs": [
                {
                    // disable sorting for the below column indices
                    'orderable': false,
                    'targets': [$('.table-listing tr th').length - 1] // first and last columns
                }
            ]
        });
    };

    var initTable3 = function () {
        // var table = $('#kt_table_1');
        var table3 = $('.simple-table-listing-with-checkbox');

        // begin first table
        table3.DataTable({
            bPaginate: false,
            searching: false,
            // scrollY: '50vh',
            // scrollX: true,
            // scrollCollapse: true,
            "order": [], //disable initial sorting
            // "order": [[1, 'asc']], // sort by first column after checkbox
            "columnDefs": [
                {
                    // disable sorting for the below column indices
                    'orderable': false,
                    'targets': [0] // first column only
                }
            ]
        });

        // header checkbox check event
        $('.kt-portlet__body').on('change', '.kt-group-checkable', function () {
            var set = table3.find('td:first-child .kt-checkable');
            var checked = $(this).is(':checked');
            single_selected_ids = [];

            $(set).each(function () {
                if (checked) {
                    single_selected_ids.push($(this).val());
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                }
                else {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                }
            });
        });

        // individual checkbox check event
        table3.on('change', 'tbody tr .kt-checkable', function () {
            if ($(this).is(":checked")) {
                single_selected_ids.push($(this).val());
            }
            else {
                var idx = $.inArray($(this).val(), single_selected_ids);
                if (idx !== -1) {
                    single_selected_ids.splice(idx, 1);
                }
            }
            $(this).parents('tr').toggleClass('active');
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            initTable1();
            initTable2();
            initTable3();
        },
    };
}();

jQuery(document).ready(function () {
    KTDatatablesBasicScrollable.init();
});