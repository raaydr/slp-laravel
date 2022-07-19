@extends('topnav.topnavAdmin')
@section('content')
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- =========================================================== -->
              <h5 class="mb-2">Informasi Pendaftar</h5>
              <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow">
                    <span class="info-box-icon bg-warning"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pendaftar</span>
                      <span class="info-box-number">{{$informasi['pendaftar']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow-none">
                    <span class="info-box-icon bg-info"><i class="fas fa-user-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pria</span>
                      <span class="info-box-number">{{$informasi['Pria']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow-sm">
                    <span class="info-box-icon bg-success"><i class="fas fa-user-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Wanita</span>
                      <span class="info-box-number">{{$informasi['Wanita']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box shadow-lg">
                    <span class="info-box-icon bg-danger"><i class="fas fa-user-check"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Super Admin</span>
                      <span class="info-box-number"></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur dibawah 17 </span>
                      <span class="info-box-number">{{$informasi['child']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur 17-22</span>
                      <span class="info-box-number">{{$informasi['dewasa']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur diatas 22 </span>
                      <span class="info-box-number">{{$informasi['old']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur rata-rata </span>
                      <span class="info-box-number">{{$informasi['meanrata']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Jakarta</span>
                      <span class="info-box-number">{{$informasi['domJak']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Bogor</span>
                      <span class="info-box-number">{{$informasi['domBog']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Depok </span>
                      <span class="info-box-number">{{$informasi['domDep']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Tangerang </span>
                      <span class="info-box-number">{{$informasi['domTang']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Bekasi </span>
                      <span class="info-box-number">{{$informasi['domBek']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-secondary"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lainnya </span>
                      <span class="info-box-number">{{$informasi['domLain']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-university"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Mahasiswa </span>
                      <span class="info-box-number">{{$informasi['mahasiswa']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Karyawan </span>
                      <span class="info-box-number">{{$informasi['karyawan']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-money-check-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pengusaha </span>
                      <span class="info-box-number">{{$informasi['pengusaha']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-school"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pelajar </span>
                      <span class="info-box-number">{{$informasi['pelajar']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fas fa-address-card"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lainnya </span>
                      <span class="info-box-number">{{$informasi['lainnya']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-pen"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Minat Writing </span>
                      <span class="info-box-number">{{$informasi['writing']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-volume-up"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Minat Public Speaking </span>
                      <span class="info-box-number">{{$informasi['speaking']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-sticky-note"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Berkas </span>
                      <span class="info-box-number">{{$informasi['berkas']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Pertama</span>
                      <span class="info-box-number">{{$informasi['pertama']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-person-booth"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Kedua </span>
                      <span class="info-box-number">{{$informasi['kedua']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- =========================================================== -->
              <!-- =========================================================== -->
              <h5 class="mb-2">Informasi Pendaftar Pria</h5>
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur dibawah 17 </span>
                      <span class="info-box-number">{{$informasi['childboy']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur 17-22</span>
                      <span class="info-box-number">{{$informasi['dewasaman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur diatas 22 </span>
                      <span class="info-box-number">{{$informasi['oldman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur rata-rata </span>
                      <span class="info-box-number">{{$informasi['meanrataman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Jakarta</span>
                      <span class="info-box-number">{{$informasi['domJakman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Bogor</span>
                      <span class="info-box-number">{{$informasi['domBogman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Depok </span>
                      <span class="info-box-number">{{$informasi['domDepman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Tangerang </span>
                      <span class="info-box-number">{{$informasi['domTangman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Bekasi </span>
                      <span class="info-box-number">{{$informasi['domBekman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-secondary"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lainnya </span>
                      <span class="info-box-number">{{$informasi['domLainman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-university"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Mahasiswa </span>
                      <span class="info-box-number">{{$informasi['mahasiswaman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Karyawan </span>
                      <span class="info-box-number">{{$informasi['karyawanman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-money-check-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pengusaha </span>
                      <span class="info-box-number">{{$informasi['pengusahaman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-school"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pelajar </span>
                      <span class="info-box-number">{{$informasi['pelajarman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fas fa-address-card"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lainnya </span>
                      <span class="info-box-number">{{$informasi['lainnyaman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-pen"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Minat Writing </span>
                      <span class="info-box-number">{{$informasi['writingman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-volume-up"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Minat Public Speaking </span>
                      <span class="info-box-number">{{$informasi['speakingman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-sticky-note"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Berkas </span>
                      <span class="info-box-number">{{$informasi['berkasman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Pertama</span>
                      <span class="info-box-number">{{$informasi['pertamaman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-person-booth"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Kedua </span>
                      <span class="info-box-number">{{$informasi['keduaman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- =========================================================== -->
              <!-- =========================================================== -->
              <h5 class="mb-2">Informasi Pendaftar Wanita</h5>
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur dibawah 17 </span>
                      <span class="info-box-number">{{$informasi['childgirl']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur 17-22</span>
                      <span class="info-box-number">{{$informasi['dewasawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur diatas 22 </span>
                      <span class="info-box-number">{{$informasi['oldwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Umur rata-rata </span>
                      <span class="info-box-number">{{$informasi['meanratawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Jakarta</span>
                      <span class="info-box-number">{{$informasi['domJakwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Bogor</span>
                      <span class="info-box-number">{{$informasi['domBogwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Depok </span>
                      <span class="info-box-number">{{$informasi['domDepwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Tangerang </span>
                      <span class="info-box-number">{{$informasi['domTangwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Domisili Bekasi </span>
                      <span class="info-box-number">{{$informasi['domBekwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-secondary"><i class="fas fa-map-marker-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lainnya </span>
                      <span class="info-box-number">{{$informasi['domLainwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-university"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Mahasiswa </span>
                      <span class="info-box-number">{{$informasi['mahasiswawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Karyawan </span>
                      <span class="info-box-number">{{$informasi['karyawanwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-money-check-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pengusaha </span>
                      <span class="info-box-number">{{$informasi['pengusahawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-warning"><i class="fas fa-school"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pelajar </span>
                      <span class="info-box-number">{{$informasi['pelajarwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-primary"><i class="fas fa-address-card"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lainnya </span>
                      <span class="info-box-number">{{$informasi['lainnyawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-success"><i class="fas fa-pen"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Minat Writing </span>
                      <span class="info-box-number">{{$informasi['writingwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-danger"><i class="fas fa-volume-up"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Minat Public Speaking </span>
                      <span class="info-box-number">{{$informasi['writingwoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
              
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-sticky-note"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Berkas </span>
                      <span class="info-box-number">{{$informasi['berkaswoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Pertama</span>
                      <span class="info-box-number">{{$informasi['pertamawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-sm">
                  <span class="info-box-icon bg-info"><i class="fas fa-person-booth"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Lulus Seleksi Kedua </span>
                      <span class="info-box-number">{{$informasi['keduawoman']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- =========================================================== -->
              <!-- =========================================================== -->
              

              <!-- =========================================================== -->
            </div><!-- /.container-fluid -->
          </section>
        <!-- /.content -->
@endsection

