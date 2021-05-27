<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>SLP Indonesia | {{$title}}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css" />
        <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
        <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/daterangepicker/daterangepicker.css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" />
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/select2/css/select2.min.css" />
        <link rel="stylesheet" href="{{asset('template')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css" />
        <!-- BS Stepper -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/bs-stepper/css/bs-stepper.min.css" />
        <!-- dropzonejs -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/dropzone/min/dropzone.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css" />
        <link href="{{asset('develop')}}/img/slp.png" rel="icon" />
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="/" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->

                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->
                    @guest @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->Biodata->nama }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="{{asset('develop')}}/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">AdminSLP</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- SidebarSearch Form -->
                    <div class="form-inline mt-2">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../widgets.html" class="nav-link active">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Seleksi
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.eliminasi') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pendaftar Tereliminasi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.gagaldaftar') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pendaftar Ulang</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.challenge') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tahap Challenge</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.challenge.rank') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rank Challenge</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.interview.antrian') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Antrian Interview</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/coba" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Layout Options
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Advanced Form</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Advanced Form</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                    <div class="row justify-content-center">

<div class="col-md-8">

    <div class="card">

        <div class="card-header">Laravel - Change Password with Current Password Validation Example</div>



        <div class="card-body">

            <form method="POST" action="{{ route('admin.change.password') }}">

                @csrf 



                 @foreach ($errors->all() as $error)

                    <p class="text-danger">{{ $error }}</p>

                 @endforeach 



                <div class="form-group row">

                    <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>



                    <div class="col-md-6">

                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">

                    </div>

                </div>



                <div class="form-group row">

                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>



                    <div class="col-md-6">

                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

                    </div>

                </div>



                <div class="form-group row">

                    <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>



                    <div class="col-md-6">

                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">

                    </div>

                </div>



                <div class="form-group row mb-0">

                    <div class="col-md-8 offset-md-4">

                        <button type="submit" class="btn btn-primary">

                            Update Password

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

</div>

                        
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block"></div>
                <strong>Copyright &copy;2021 <a href="https://slpindonesia.com">SLP Indonesia</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
        <script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- Select2 -->
        <script src="{{asset('template')}}/plugins/select2/js/select2.full.min.js"></script>

        <script src="{{asset('template')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

        <script src="{{asset('template')}}/plugins/moment/moment.min.js"></script>
        <script src="{{asset('template')}}/plugins/inputmask/jquery.inputmask.min.js"></script>

        <script src="{{asset('template')}}/plugins/daterangepicker/daterangepicker.js"></script>

        <script src="{{asset('template')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

        <script src="{{asset('template')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

        <script src="{{asset('template')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

        <script src="{{asset('template')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>

        <script src="{{asset('template')}}/plugins/dropzone/min/dropzone.min.js"></script>

        <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>

        <script src="{{asset('template')}}/dist/js/demo.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('template')}}/dist/js/demo.js"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Initialize Select2 Elements
                $(".select2bs4").select2({
                    theme: "bootstrap4",
                });

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
                //Money Euro
                $("[data-mask]").inputmask();

                //Date picker
                $("#reservationdate").datetimepicker({
                    format: "L",
                });

                //Date and time picker
                $("#reservationdatetime").datetimepicker({ icons: { time: "far fa-clock" } });

                //Date range picker
                $("#reservation").daterangepicker();
                //Date range picker with time picker
                $("#reservationtime").daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: "MM/DD/YYYY hh:mm A",
                    },
                });
                //Date range as a button
                $("#daterange-btn").daterangepicker(
                    {
                        ranges: {
                            Today: [moment(), moment()],
                            Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                            "Last 7 Days": [moment().subtract(6, "days"), moment()],
                            "Last 30 Days": [moment().subtract(29, "days"), moment()],
                            "This Month": [moment().startOf("month"), moment().endOf("month")],
                            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                        },
                        startDate: moment().subtract(29, "days"),
                        endDate: moment(),
                    },
                    function (start, end) {
                        $("#reportrange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
                    }
                );

                //Timepicker
                $("#timepicker").datetimepicker({
                    format: "LT",
                });

                //Bootstrap Duallistbox
                $(".duallistbox").bootstrapDualListbox();

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                $(".my-colorpicker2").on("colorpickerChange", function (event) {
                    $(".my-colorpicker2 .fa-square").css("color", event.color.toString());
                });

                $("input[data-bootstrap-switch]").each(function () {
                    $(this).bootstrapSwitch("state", $(this).prop("checked"));
                });
            });
            // BS-Stepper Init
            document.addEventListener("DOMContentLoaded", function () {
                window.stepper = new Stepper(document.querySelector(".bs-stepper"));
            });

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false;

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            var myDropzone = new Dropzone(document.body, {
                // Make the whole body a dropzone
                url: "/target-url", // Set the url
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
            });

            myDropzone.on("addedfile", function (file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function () {
                    myDropzone.enqueueFile(file);
                };
            });

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function (progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
            });

            myDropzone.on("sending", function (file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1";
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function (progress) {
                document.querySelector("#total-progress").style.opacity = "0";
            });

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function () {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            };
            document.querySelector("#actions .cancel").onclick = function () {
                myDropzone.removeAllFiles(true);
            };
            // DropzoneJS Demo Code End
            $(function () {
                $(".toggle-class").change(function () {
                    var boolean = $(this).prop("checked") == true ? 1 : 0;

                    var user_id = $(this).data("id");

                    $.ajax({
                        type: "GET",

                        dataType: "json",

                        url: "/penutupan-pendaftaran",

                        data: { boolean: boolean, id: user_id },

                        success: function (data) {
                            console.log(data.success);
                        },
                    });
                });
            });
        </script>
    </body>
</html>
