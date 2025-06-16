@if(Session::has('error') || $errors->any())
  <script>
    $(document).ready(function () {
      toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "progressBar": true,
        "showDuration": "100",
        "preventDuplicates": false,
        "hideDuration": "2500",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };

      @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
      @endif

      @if($errors->any())
        @foreach ($errors->all() as $error)
          toastr.error("{{ $error }}");
        @endforeach
      @endif
    });
  </script>
@endif
