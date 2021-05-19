@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center">{{ __('Form Pedaftaran SLP Indonesia') }}</div>
               <!--<a class="text-center m-2"><b>Semua Form Harus Dilengkapi </b></a>-->
                <a class="text-center m-2"><b>Pendaftaran sudah ditutup</b></a>
                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="was-validated">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus />

                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />

                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus />
                                <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Minimal 8 karakter
                                </small>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus />
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Tolong dilengkapi</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Pria" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline1">Pria</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Wanita" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline2">Wanita</label>
                                </div>
                            </div>

                            <span class="invalid-feedback" role="alert">
                                <strong>tolong diisi</strong>
                            </span>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    <input placeholder="masukkan tanggal Lahir" type="text" class="form-control datepicker" name="tanggal_lahir" required autofocus />
                                </div>
                            </div>
                            <small id="passwordHelpBlock" class="form-text text-sucess">
                                Format: YYYY-MM-DD, contoh 1990-11-29.
                            </small>
                        </div>

                        <div class="form-group row">
                            <label for="domisili" class="col-md-4 col-form-label text-md-right">{{ __('Domisili sekarang') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline3" name="domisili" class="custom-control-input" value="Jakarta" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline3">Jakarta</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="domisili" class="custom-control-input" value="Bogor" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline4">Bogor</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" name="domisili" class="custom-control-input" value="Depok" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline5">Depok</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline6" name="domisili" class="custom-control-input" value="Tangerang" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline6">Tangerang</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline7" name="domisili" class="custom-control-input" value="Bekasi" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline7">Bekasi</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline8" name="domisili" class="custom-control-input" value="Lainnya" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline8">Lainnya</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_domisili" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>
                            <div class="col-md-6">
                                <textarea
                                    id="alamat_domisili"
                                    type="text"
                                    class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                    name="alamat_domisili"
                                    value="{{ old('alamat_domisili') }}"
                                    rows="3"
                                    required
                                    autofocus
                                ></textarea>

                                @if ($errors->has('alamat_domisili'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat_domisili') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('No Handphone (terhubung dengan Whatsapp)') }}</label>

                            <div class="col-md-4">
                                <input id="phonenumber" type="text" class="form-control{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus />

                                @if ($errors->has('phonenumber'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aktivitas" class="col-md-4 col-form-label text-md-right">{{ __('Aktivitas atau pekerjaan saat ini') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline9" name="aktivitas" class="custom-control-input" value="Mahasiswa" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline9">Mahasiswa</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline10" name="aktivitas" class="custom-control-input" value="Pelajar" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline10">Pelajar</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline11" name="aktivitas" class="custom-control-input" value="Karyawan" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline11">Karyawan</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline12" name="aktivitas" class="custom-control-input" value="Pengusaha" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline12">Pengusaha</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline13" name="aktivitas" class="custom-control-input" value="Yang lain" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline13">Yang lain</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="minatprogram" class="col-md-4 col-form-label text-md-right">{{ __('Silahkan Pilih Peminatan Program Spesifikasi') }}</label>
                            <div class="col-md-7">
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="customRadioInline14" name="minatprogram" class="custom-control-input" value="Public Speaking" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline14">Public Speaking</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline15" name="minatprogram" class="custom-control-input" value="Creative Writing" required autofocus />
                                    <label class="custom-control-label" for="customRadioInline15">Creative Writing</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alasanBeasiswa" class="col-md-4 col-form-label text-md-right">{{ __('Mengapa kamu ingin mendapatkan beasiswa ini? ') }}</label>
                            <div class="col-md-6">
                                <textarea
                                    id="alasanBeasiswa"
                                    type="text"
                                    class="form-control{{ $errors->has('alasanBeasiswa') ? ' is-invalid' : '' }}"
                                    name="alasanBeasiswa"
                                    value="{{ old('alasanBeasiswa') }}"
                                    rows="3"
                                    required
                                    autofocus
                                ></textarea>

                                @if ($errors->has('alasanBeasiswa'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alasanBeasiswa') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="five_pros" class="col-md-4 col-form-label text-md-right">{{ __('Sebutkan 5 kelebihan yang kamu miliki !') }}</label>
                            <div class="col-md-6">
                                <textarea id="five_pros" type="text" class="form-control{{ $errors->has('five_pros') ? ' is-invalid' : '' }}" name="five_pros" value="{{ old('five_pros') }}" rows="3" required autofocus></textarea>

                                @if ($errors->has('five_pros'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('five_pros') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="five_cons" class="col-md-4 col-form-label text-md-right">{{ __('Sebutkan 5 kekurangan yang kamu miliki !') }}</label>
                            <div class="col-md-6">
                                <textarea id="five_cons" type="text" class="form-control{{ $errors->has('five_cons') ? ' is-invalid' : '' }}" name="five_cons" value="{{ old('five_cons') }}" rows="3" required autofocus></textarea>

                                @if ($errors->has('five_cons'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('five_cons') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                            <div class="col-md-7">
                                <input id="url_foto" type="file" class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}" name="url_foto" value="{{ old('url_foto') }}" required autofocus />
                                <small id="passwordHelpBlock" class="form-text text-sucess">
                                    Format harus jpg,png,jpeg dan ukuran 2 mb
                                </small>
                                @if ($errors->has('url_foto'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url_foto') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!--  Error handle -->
                        @if($errors->any())
                        <div class="row collapse">
                            <ul class="alert-box warning radius">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(($pendaftaran)== TRUE)
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
