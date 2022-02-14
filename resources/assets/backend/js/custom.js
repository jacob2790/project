$(function () {

    $('.alert-success').delay(3000).fadeOut('slow');



    if ($('.kt-select2').length > 0) {

        $('.kt-select2').select2({

            placeholder: "--- Select ---",

        });

    }



    $('#filter_button').on('click', function (e) {

        $('#filter_button').prop('disabled', 'disabled');

        block_page();

        $('#filter_form').submit();

    });



    $('#add_button').on('click', function (e) {

        $('#add_form').submit();

    });



    $('#update_button').on('click', function (e) {

        $('#update_form').submit();

    });



    $('.input-numeric').on('keypress', function (e) {

        var charCode = (e.which) ? e.which : e.keyCode;

        return ((charCode >= 48 && charCode <= 57)); // numeric only

    });



    $('.input-numeric-with-decimal').on('keypress', function (e) {

        var charCode = (e.which) ? e.which : e.keyCode;

        return (charCode === 46 || (charCode >= 48 && charCode <= 57)); // numeric with decimal

    });



    $('.fixed-chars-10').on('keypress', function (e) {

        var max_chars = 10;



        if ($(this).val().length >= max_chars) {

            //$(this).val($(this).val().substr(0, max_chars));

            return false;

        }

    });



    // show password text

    $('i.show-hide').on('click', function (e) {

        var x = $(this).parents('div.input-addon-right').children('input');



        if (x.attr('type') === "password") {

            x.attr('type', 'text');

        } else {

            x.attr('type', 'password');

        }

    });



    if ($('.indian_locale_number_format').length > 0) {

        $('.indian_locale_number_format').each(function (index, value) {

            $numeric_value = $(this).html();

            $numeric_value = new Number($numeric_value).toLocaleString('en-IN');

            $(this).html($numeric_value);

        });

    }



    if ($('.indian_locale_currency_format').length > 0) {

        $('.indian_locale_currency_format').each(function (index, value) {

            $numeric_value = $(this).html();

            $numeric_value = new Number($numeric_value).toLocaleString('en-IN', {style: 'currency', currency: 'INR'});

            $(this).html($numeric_value);

        });

    }



    $('#hierarchy_select').on('click', function () {

        if ($('.multiplesFilter').length > 0) {

            $('.multiplesFilter').focus();

            $('.multiplesFilter').select();

        }

        else

            $(this).select();

    });

    $('.comboTreeArrowBtn').on('click', function () {

        console.log($('.multiplesFilter').length);

        if ($('.multiplesFilter').length > 0) {

            $('.multiplesFilter').focus();

            $('.multiplesFilter').select();

        }

        else

            $('#hierarchy_select').select();

    });



// // show generated sef url dynamically

// $('.sef_url_title').on('keyup', function (e) {

//     e.preventDefault();

//

//     $.ajax({

//         url: 'searchajax',

//     })

//         .done(function () {

//             alert("oui");

//             $('#sef_url').val();

//         })

//         .fail(function () {

//             alert("non");

//         });

//

// });

})

;



function change_status(url) {

    swal.fire({

        title: 'Are you sure you want to change the status?',

        text: "",

        type: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Yes, change it!'

    }).then(function (result) {

        if (result.value) {

            block_page();

            window.location.replace(url);

        }

    });

}



function delete_record(url) {

    swal.fire({

        title: 'Are you sure you want to delete this?',

        text: "You won't be able to revert this!",

        type: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Yes, delete it!'

    }).then(function (result) {

        if (result.value) {

            $('.btn-delete').prop('disabled', 'disabled');

            block_page();

            window.location.replace(url);

        }

    });

}



function delete_records(url, selected_count) {

    if (selected_count > 0 && selected_ids.length > 0) {

        swal.fire({

            title: 'Are you sure you want to delete the record/s?',

            text: "You won't be able to revert this!",

            type: 'warning',

            showCancelButton: true,

            confirmButtonText: 'Yes, delete them!'

        }).then(function (result) {

            if (result.value) {

                $('#delete_records').prop('disabled', 'disabled');

                block_page();

                window.location.replace(url + selected_ids);

            }

        });

    }

    else {

        swal.fire(

            'Please select at least one record to delete.',

            '',

            'info'

        )

    }

}



function is_valid_percentage(evt) {

    if (!(evt.charCode == 46 || (evt.charCode >= 48 && evt.charCode <= 57)))

        return false;

    var parts = evt.srcElement.value.split('.');

    if (parts.length > 2)

        return false;

    if (evt.charCode == 46)

        return (parts.length == 1);

    if (evt.charCode != 46) {

        var currVal = String.fromCharCode(evt.charCode);

        val1 = parseFloat(String(parts[0]) + String(currVal));

        if (parts.length == 2)

            val1 = parseFloat(String(parts[0]) + "." + String(currVal));

    }



    if (val1 > 99.99)

        return false;

    if (parts.length == 2 && parts[1].length >= 2) return false;

}



(function ($) {

    $.fn.inputFilter = function (inputFilter) {

        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {

            if (inputFilter(this.value)) {

                this.oldValue = this.value;

                this.oldSelectionStart = this.selectionStart;

                this.oldSelectionEnd = this.selectionEnd;

            } else if (this.hasOwnProperty("oldValue")) {

                this.value = this.oldValue;

                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);

            }

        });

    };

}(jQuery));

