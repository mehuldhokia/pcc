$(document).ready(function () {
    debugger;
    if (window.location.href.indexOf('?') > 0) {
        var value = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    }
    else {
        //var value = "000000"; // "some_value"
    }
    $('#ReferBy').val(value);

    var referalCode = Math.random().toString(36).substring(2, 3) + Math.random().toString(36).substring(2, 7);
    $('#ReferCode').val(referalCode);
});

$(function () {
    $('.input-group.date').datepicker({
        todayBtn: "linked",
        language: "it",
        autoclose: true,
        todayHighlight: true,
        dateFormat: 'dd/mm/yyyy'
    });

    //$(".input-group.date").datepicker({
    //    changeMonth: true,
    //    changeYear: true,
    //    dateFormat: 'dd/mm/yy'
    //});
});