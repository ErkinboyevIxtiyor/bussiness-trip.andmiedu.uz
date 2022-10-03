<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AndMI | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
       <!-- SweetAlert2 -->
       <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
       <!-- Toastr -->
       <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box " style="width: 450px">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary p-1 rounded-0">
    <div class=" text-center mt-2">
      @foreach ($system_logo as $item)
          <img src="{{asset('system/system_logo/'.$item->system_logo)}}" alt="" class="w-25">
      @endforeach
    </div>
    <h4 class="text-center mt-1">Andijon mashinasozlik instituti</h4>
    <div class="">
      <p class="login-box-msg mt-1">Xizmat safarini boshqarish axborot tizimi</p>
        <div class="card-body p-0 p-2">      
            <form action="/login/check" method="POST" class="">
                @csrf
              <div class="input-group">
                <input type="email" class="form-control rounded-0" placeholder="Email" name="email" value="{{old('email')}}">
                <div class="input-group-append">
                  {{-- <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div> --}}
                </div>
              </div>
              <div class="d-flex justify-content-end mb-3">
                <span class="text-danger">@error('email')
                    Email bo‘sh bolishi mumkun emas
                @enderror</span>
            </div>
              <div class="input-group">
                <input type="password" class="form-control rounded-0" placeholder="Parol" name="password">
                <div class="input-group-append">
                  {{-- <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div> --}}
                </div>
              </div>
              <div class="d-flex justify-content-end mb-3">
                <span class="text-danger">@error('password')
                    Parol bo‘sh bolishi mumkun emas
                @enderror</span>
            </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Eslab qolish
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat text-start">Kirish</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
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
