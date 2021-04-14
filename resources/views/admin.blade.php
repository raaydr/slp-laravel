@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Lengkap</th>
                          <th scope="col">E-Mail</th>
                          <th scope="col">status</th>
                          <th scope="col">seleksi 1</th>
                          <th scope="col">seleksi 2</th>
                          <th scope="col">seleksi 3</th>
                          <th scope="col">seleksi 4</th>
                          <th scope="col">seleksi 5</th>
                          <th scope="col">seleksi 6</th>
                          <th scope="col">FOTO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach ($users as $user)
                        <?php $i++ ;?>
                        <tr>
                          <th scope="row">{{ $i }}</th>
                          <td>{{ $user->Biodata->nama }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->Biodata->status }}</td>
                          <td>{{ $user->Biodata->seleksi_1 }}</td>
                          <td>{{ $user->Biodata->seleksi_2 }}</td>
                          <td>{{ $user->Biodata->seleksi_3 }}</td>
                          <td>{{ $user->Biodata->seleksi_4 }}</td>
                          <td>{{ $user->Biodata->seleksi_5 }}</td>
                          <td>{{ $user->Biodata->seleksi_6 }}</td>
                          <td>
                           <a href="{{asset('imgdaftar')}}/{{$user->Biodata->url_foto}}" target="_blank">Lihat Foto {{ $user->Biodata->nama }}</a>
                           
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection