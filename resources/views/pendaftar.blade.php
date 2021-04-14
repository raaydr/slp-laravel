@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               <img src='{{ asset("imgdaftar/$biodata->url_foto") }}' class='img-thumbnail' alt='User Image'>
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          <td class="table-info" width="200px">Nama Lengkap</td>
                          <td>{{ $biodata->nama }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">TTL</td>
                          <td> {{ $biodata->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Jenis Kelamin</td>
                          <td>{{ $biodata->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Status</td>
                          <td>{{ $biodata->status }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Telp/phone</td>
                          <td>{{ $biodata->phonenumber }}</td>
                        </tr>                
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection