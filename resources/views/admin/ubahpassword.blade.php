@extends('topnav.topnavAdmin')
@section('content')
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Ubah Password</h1>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                    @if(session('berhasil'))
                    <div class="alert alert-success alert-dismissable md-5">
                        <button type="button" class ="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-info"></i>Berhasil</h5>
                        {{session('berhasil')}}.
                    </div>
                  @endif
                    <div class="row justify-content-center">

                    <div class="col-md-8">

                        <div class="card">

                            <div class="card-header primary">Ubah Password</div>



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
@endsection
@section('script')
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
@endsection

