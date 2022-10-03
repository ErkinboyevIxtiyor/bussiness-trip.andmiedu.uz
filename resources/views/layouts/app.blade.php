<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{asset('my_file/style/style.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
  

<style>
  .drop-zone{
    max-width: 200px;
    height: 200px;
    cursor: pointer;
    color: #cccc;
    border:4px dashed #007bff;
    border-radius: 10px;
    /* @foreach ($system_logo as $logo)
    background: url({{asset('system/system_logo/'. $logo->system_logo)}});
    @endforeach */
    background-size: cover;
    position: relative;
    background-repeat: no-repeat;
}
.drop-zone__prompt{
      opacity: 0;
  }
.drop-zone__prompt:hover{
  opacity: 1;
}
</style>
  {{-- Table CSS --}}

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  @livewireStyles

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  @include('layouts.topMenu')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('layouts.leftMenu')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
{{-- Toastr js --}}
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('my_file/script/script.js')}}"></script>


@livewireScripts

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.faculty_select').select2()

    //Initialize Select2 Elements
    $('.faculty_select').select2({
      theme: 'bootstrap4',
      placeholder: "Select a state",
      minimumResultsForSearch: Infinity
    })
    $('.employee_select').select2()

    //Initialize Select2 Elements
    $('.employee_select').select2({
      theme: 'bootstrap4',
      placeholder: "Select a state",
      minimumResultsForSearch: Infinity
    })
    $('.position_select').select2({
      theme: 'bootstrap4',
      placeholder: "Select a state",
      // minimumResultsForSearch: Infinity
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'yyyy/mm/dd' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate3').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate4').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate5').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate6').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

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
toastr.success("{{ Session::get('update')}}")
@endif
// DELETE
@if(Session::has('delete'))
toast_options
toastr.error("{{ Session::get('delete')}}")
@endif
// ADMIN ERROR
@if(Session::has('admin_error'))
toast_options
toastr.error("{{ Session::get('admin_error')}}")
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
toastr.success("{{ Session::get('post-category-published')}}")
@endif
// ADMIN WELCOME
@if(Session::has('admin_welcome'))
toast_options
toastr.success("{{ Session::get('admin_welcome')}}")
@endif

</script>


<script>
  
  $(document).ready(function () {
      $(".nav-treeview .nav-link, .nav-link").each(function () {
          var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
          var link = this.href;
          if(link == location2){
              $(this).addClass('active');
              $(this).parent().parent().parent().addClass('menu-is-opening menu-open');
  
          }
      });
  })
  </script>

</body>
</html>
