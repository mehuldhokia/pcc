<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>::PCC India ::</title>

<!-- Favicon-->
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" />


<!-- plugin css file  -->
<link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">

<!-- project css file  -->
<link rel="stylesheet" href="{{ asset('dist/pcc.style.min.css') }}">

<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('dist/toastr/toastr.css') }}">
<script src="{{ asset('dist/toastr/jquery.min.js') }}"></script>
<script src="{{ asset('dist/toastr/toastr.min.js') }}"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        // "newestOnTop": false,
        // "positionClass": "toast-bottom-center",
        // "preventDuplicates": false,
        // "onclick": null,
        // "showDuration": "300",
        // "hideDuration": "1000",
        // "timeOut": "5000",
        // "extendedTimeOut": "1000",
        // "showEasing": "swing",
        // "hideEasing": "linear",
        // "showMethod": "fadeIn",
        // "hideMethod": "fadeOut"
    }
</script>

<!-- Validation -->
<link rel="stylesheet" href="{{ asset('dist/assets/plugin/parsleyjs/css/parsley.css') }}">

{{-- <style>
    /* Hide Input Number Arrows */
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
</style> --}}
