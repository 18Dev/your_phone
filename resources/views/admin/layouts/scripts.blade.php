<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- query-v3.7.1 -->
<script src="{{ asset('plugins/js/jquery-v3.7.1.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('plugins/js/sb-admin-2.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
        }
    });
</script>

<!-- Common scripts -->
<script src="{{ asset('common/js/script.js') }}"></script>
<script src="{{ asset('common/js/common.js') }}" type="module"></script>

<!-- Toastr scripts -->
<script src="{{ asset('plugins/js/toastr.min.js') }}"></script>

<!-- Sweetalert scripts -->
<script src="{{ asset('plugins/js/sweetalert.min.js') }}"></script>

@yield('scripts')




