<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('vendor/slick-1.8/slick.js') }}"></script>
<script src="{{ asset('js/helpers.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @if (Session::has('message'))

        var message = "{!! Session::get('message') !!}";
        var type = "{{ Session::get('type') }}";
        toastr.options = {
          "positionClass": "toast-bottom-right",
        }

        switch(type) {
            case('success'):
                toastr.success(message)
                break;
            case('info'):
                toastr.info(message)
                break;
            case('warning'):
                toastr.warning(message)
                break;
            case('error'):
                toastr.error(message)
                break;
        }

    @endif

</script>

@yield('scripts')