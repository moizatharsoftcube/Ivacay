<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" ></script> -->
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('guider/js/all.js')}}"></script>

<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('guider/js/custom.js')}}"></script>

<!-- For stripe -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- Toaster JS-->
<script src="{{asset('build/toastr.min.js')}}"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-full-width",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@stack('js')
