
                 <!-- Content Header (Page header) -->
                 <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>TARGET TUGAS ENTREPRENEUR</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Tugas</a></li>
                           <li class="breadcrumb-item active">Target Entrepreneur</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12" id="accordion">
                        <?php $i = 0; ?>
                            @foreach ($target as $target_tugas)
                        <?php $i++ ;?>
                        <div class="card card-orange card-outline">
                           <a class="d-block w-100" data-toggle="collapse" href="#collapse-{{$i}}">
                              <div class="card-header">
                                 <h4 class="card-title w-100">
                                    <b>{{$target_tugas->judul}}</b>
                                    <a>Tanggal Mulai : {{$target_tugas->mulai}}</a>
                                 </h4>
                                 
                                
                              </div>
                           </a>
                           <div id="collapse-{{$i}}" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                                 
                                 <?php
                                       echo $target_tugas->keterangan ;
                                       ?>   
                              </div>
                           </div>
                           <div class="card-footer">
                                <a class="btn btn-primary" href="{{ route('target.InputTugasWriting',$target_tugas->id) }}">Kerjakan</a>
                              </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
