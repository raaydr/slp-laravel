<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Rapor Tugas Writing</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="/">Rapor</a></li>
               <li class="breadcrumb-item active">Writing</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-3">
         <!-- Profile Image -->
         <div class="card card-primary card-outline">
            <div class="card-body box-profile">
               <div class="text-center">
                  <a class="btn btn-default" href="{{asset('imgdaftar')}}/{{$biodata->url_foto}}" target="_blank">
                  <img class="profile-user-img img-fluid" src="{{asset('imgdaftar')}}/{{$biodata->url_foto}}" class="img-fluid" alt="Cinque Terre" />
                  </a>
               </div>
               <h3 class="profile-username text-center">{{ $biodata->nama }}</h3>
               <p class="text-muted text-center">{{ $biodata->aktivitas}}</p>
               <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"><b>Domisili</b> <a class="float-right">{{$biodata->domisili}}</a></li>
                  <li class="list-group-item"><b>Jenis Kelamin</b> <a class="float-right">{{$biodata->jenis_kelamin}}</a></li>
                  <li class="list-group-item"><b>Tanggal Lahir</b> <a class="float-right">{{$biodata->tanggal_lahir}}</a></li>
                  <li class="list-group-item"><b>Grup</b> <a class="float-right">{{$user->Peserta->grup}}</a></li>
               </ul>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <div class="col-md-9">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Rapor</h3>
               
            </div>
            <div class="card-body">
               <div class="row">
                  @foreach ($rapor as $hasil)
                  @if(($hasil['boolean'])==0)
                  <div class="col-12">
                     <!-- small card -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <h3>{{$hasil['jumlah']}}</h3>
                           <p>{{$hasil['judul']}}</p>
                        </div>
                        <div class="icon">
                           <i class="fas fa-book"></i>
                        </div>
                        <a  class="small-box-footer">
                        Terakhir Input :  {{$hasil['terakhir']}}
                        </a>
                     </div>
                  </div>
                  @endif
                  @if(($hasil['boolean'])==1)
                  <!-- ./col -->
                  <div class="col-12">
                     <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="fas fa-pen"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text">{{$hasil['judul']}}</span>
                           <span class="info-box-number">{{$hasil['jumlah']}}</span>
                           <div class="progress">
                              <div class="progress-bar" style="width: {{$hasil['capai']}}%"></div>
                           </div>
                           <span class="progress-description">
                           {{$hasil['capai']}}% dari {{$hasil['target']}}
                           <br>
                           Terakhir Input :  {{$hasil['terakhir']}}
                           </span>
                        </div>
                        <!-- /.info-box-content -->
                        <div class="info-box-footer">
                        </div>
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  @endif
                  @endforeach
               </div>
               <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
               
               <br />
            </div>
            <!-- /.card-footer-->
         </div>
         <!-- /.card -->
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card-primary ">
            <div class="card-header">
               <h3 class="card-title">List Tugas Writing Peserta</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Grup</th>
                        <th>Target Tugas</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th></th>
                        <th><input type="text" placeholder="Search"  style="width: 100%"  /></th>
                        <th><input type="text" style="width: 30%" /></th>
                        <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                        <th><input type="text" style="width: 100%"/></th>
                        <th><input type="text" placeholder="Search"  style="width: 70%"/></th>
                        <th></th>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</section>
<!-- /.content -->
