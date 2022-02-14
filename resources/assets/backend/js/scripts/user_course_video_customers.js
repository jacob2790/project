$(function () {

    $('.change_status').on('click', function () {

        var id = $(this).attr('data-id');

        var status = $(this).attr('data-content');



        $('#id').val(id);

        $('#has_finished_playback').val(status);

    });

});


/*
var table_to_export_id = 'table_export';

var table_to_export = document.getElementById(table_to_export_id);



var instance = new TableExport(table_to_export, {

    filename: 'Enquiries',

    exportButtons: false,

    formats: ['xlsx'],

    ignoreCols: [0, 5]

});*/

/*

var XLS = instance.CONSTANTS.FORMAT.XLSX;

//var CSV = instance.CONSTANTS.FORMAT.CSV;



//                                          // "id"  // format

var export_data_XLS = instance.getExportData()[table_to_export_id][XLS];

//var export_data_CSV = instance.getExportData()[table_to_export_id][CSV];



// get filesize

var bytes_XLS = instance.getFileSize(export_data_XLS.data, export_data_XLS.fileExtension);

//var bytes_CSV = instance.getFileSize(export_data_CSV.data, export_data_CSV.fileExtension);



console.log('filesize (XLS):', bytes_XLS + 'B');

//console.log('filesize (CSV):', bytes_CSV + 'B');



var button_XLS = document.getElementById('export_records_xls');

button_XLS.addEventListener('click', function (e) {

    //                   // data             // mime                 // name                 // extension

    instance.export2file(export_data_XLS.data, export_data_XLS.mimeType, export_data_XLS.filename, export_data_XLS.fileExtension);

});*/



// var button_CSV = document.getElementById('export_records_csv');

// button_CSV.addEventListener('click', function (e) {

//     //                   // data             // mime                 // name                 // extension

//     instance.export2file(export_data_CSV.data, export_data_CSV.mimeType, export_data_CSV.filename, export_data_CSV.fileExtension);

// });