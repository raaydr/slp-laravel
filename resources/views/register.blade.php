<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="{{asset('develop/css/sb-admin.min.css')}}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />

        <title>Daftar</title>
    </head>
    <body style="background-image: url('{{asset('develop/img/LostSphear.jpg')}}')" ;>
        <div class="container">
            <div class="text-center mt-3">
                <a><img src="{{asset('develop/img/logo.png')}}" width="200" class="img-fluid" alt="Responsive image" title="Smart Leader Preneur" alt="Smart Leader Preneur" /></a>
            </div>
            <div class="card mx-auto mt-2">
                <div class="card-header text-center">Pendaftaran Beasiswa SLP Indonesia</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="InputUserName">Nama Lengkap</label>
                                <input class="form-control" id="InputUserName" type="username" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="InputUserName">Email</label>
                                <input class="form-control" id="InputUserName" type="username" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="InputUserName">Nomor Telp WA</label>
                                <input class="form-control" id="InputUserName" type="username" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label for="example-date-input" class="col-form-label">Tanggal lahir</label>

                                <input class="form-control" type="date" value="2011-08-19" id="example-date-input" />
                            </div>
                            <div class="form-group">
                                <label for="InputUserName">Upload foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" />
                                    <label class="custom-file-label" for="inputGroupFile01">foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="country">Domisili Jabodetabek</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">pilih</option>
                                    <option>ya</option>
                                    <option>tidak</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputUserName">alamat domisili</label>
                                <input class="form-control" id="InputUserName" type="username" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="country">Status</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">pilih</option>
                                    <option>pelajar</option>
                                    <option>mahasiswa</option>
                                    <option>lain-lain</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputUserName">Upload CV</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" />
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6LfuKZoaAAAAAJrXDoPa3QXZIvTcsspbVoh_fn5R " data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                        <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-center mt-3">
                                        <a class="btn btn-primary" href="">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var date_input = $('input[name="date"]'); //our date input has the name "date"
                var container = $(".bootstrap-iso form").length > 0 ? $(".bootstrap-iso form").parent() : "body";
                var options = {
                    format: "mm/dd/yyyy",
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                };
                date_input.datepicker(options);
            });
        </script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>
