$(function () {
    //hide flash messages
    dismissAlert();

    //Initialize Select2 Element for standard select box
    $(".select_2").select2({
        minimumResultsForSearch: 5
    });

    $('body').on("keydown", ".prevent-edit", function (evt) {
        return false;
    });
    
    // for checking if the pressed key is a number
    $('body').on("keypress", ".number_only", function (evt) {
        var fieldValue  = $(this).val();
        var elementId   = $(this).attr("id");

        var charCode = (evt.which) ? evt.which : event.keyCode;
        if(elementId == 'phone') {
            if(fieldValue.length == 0 && charCode == 43) {
                return true;
            }
            if(fieldValue.length >= 13) {
                evt.preventDefault();
                $("#phone").data("title", "Phone number must be between 10 and 13 digits!").tooltip("show");
                return false;
            }
        }
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            evt.preventDefault();
            $(this).data("title", "Only numbers are allowed!").tooltip("show");
            return false;
        }
        
        $(this).data("title", "");
        return true;
    });

    // for checking if the pressed key is a number or decimal
    $('body').on("keypress", ".decimal_number_only", function (evt) {
        // attaching 1 to the end for number like 1.0
        var fieldValue = $(this).val() + '1';
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57))) {
            evt.preventDefault();
            $(this).data("title", "Only numbers are allowed!").tooltip("show");
            return false;
        }
        if(charCode == 46 && (fieldValue % 1 != 0)) {
            evt.preventDefault();
            $(this).data("title", "Only numbers and decimal point are allowed!").tooltip("show");
            return false;
        }

        $(this).data("title", "");
        return true;
    });

    // for checking if the pressed key is a alphabet
    $('body').on("keypress", ".alpha_only", function (evt) {
        var fieldValue = $(this).val();
        var charCode = (evt.which) ? evt.which : event.keyCode;

        if (!((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122))) {
            evt.preventDefault();
            $(this).data("title", "Only alphabets are allowed!").tooltip("show");
            return false;
        }
        $(this).data("title", "");
        return true;
    });

    // for disabling submit button to prevent multiple submition
    $('body').on("click", ".submit-button", function () {
        $('.submit-button').prop('disabled', true);
        $(this).parents('form:first').submit();
    });
});
function dismissAlert() {
    if($("#alert-message").hasClass('alert-success')) {
    	$("#alert-message").fadeTo(3000, 500).slideUp(500, function(){
            $("#alert-message").slideUp(500);
        });
    } else {
        $("#alert-message").fadeTo(8000, 500).slideUp(1000, function(){
            $("#alert-message").slideUp(500);
        });
    }
}