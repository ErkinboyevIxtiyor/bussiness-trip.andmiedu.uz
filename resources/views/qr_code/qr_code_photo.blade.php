<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Xizmat safarini tekshirish</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
       <!-- SweetAlert2 -->
       <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
       <!-- Toastr -->
       <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
</head>
<body class="" style="height: auto; min-height: 100%;">
<div class="">

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
{{-- Toastr js --}}
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
    // TOASTR_OPTIONS
    let toast_options = toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
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
    // END TOASTR_OPTIONS
  // Update
   @if(Session::has('update'))
   toast_options
  toastr.info("{{ Session::get('update')}}")
  @endif
  // DELETE
  @if(Session::has('delete'))
  toast_options
  toastr.error("{{ Session::get('delete')}}")
  @endif
  // ADMIN ERROR
  @if(Session::has('error'))
  toast_options
  toastr.error("{{ Session::get('error')}}")
  @endif
  // SAVE
  @if(Session::has('save'))
  toast_options
  toastr.success("{{ Session::get('save')}}")
  @endif
  // EMAIL FAIL
  @if(Session::has('email_fail'))
  toast_options
  toastr.error("{{ Session::get('email_fail')}}")
  @endif
  // POST CATEGORY PUBLISHED
  @if(Session::has('post-category-published'))
  toast_options
  toastr.info("{{ Session::get('post-category-published')}}")
  @endif
  // ADMIN WELCOME
  @if(Session::has('admin_welcome'))
  toast_options
  toastr.success("{{ Session::get('admin_welcome')}}")
  @endif
  </script>
</body>
</html>
