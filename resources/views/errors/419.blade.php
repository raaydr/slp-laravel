@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Jangan panik ya'))
@section('tes')
<body class="text-center">
      <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
         <header class="masthead mb-auto">
            <div class="inner">
               <h3 class="masthead-brand">Error 419</h3>
            </div>
         </header>
         <main role="main" class="inner cover">
            <h1 class="cover-heading">Kenapa bisa begini ???</h1>
            <p class="lead">Ada beberapa kemungkinan, kenapa kamu bisa ke page ini</p>
            <p class="lead">
               <ol>
                                <li><a class="text-primary">Kamu masih buka Tab yang lama, jadi harus buka Tab baru lalu buka ulang website <a class="text-warning" href="https://slpindonesia.com/" target="_blank"><b>SLP</b></a></a>.</li>
                                Penjelasannya sih, Kamu buka website SLP nih abis itu logout cuma tab nya masih kamu simpen di browser dan ditinggal beberapa waktu. Nah pas mau login di tab yang sama jadinya gitu, tokennya expired(udah gk berlaku). Jadi klo udah selesai lebih baik hapus tabnya.
                                <li><a class="text-primary">Antara browser(handphone) kamu yang bermasalah, solusinya antara kamu install ulang browsernya atau download browser lain(misal firefox atau vivaldi)</li>
                                <li><a class="text-primary">Nah kalau masih belum bisa, coba liat tampilan browsernya di atas</li>
                                <a class="text-danger" href="{{asset('develop/img')}}/error.png" target="_blank">klik ini</a>
                                <br>
                                nanti diklik trus pilih "open in bla bla", soalnya kamu masih belum buka dibrowser
                                <li><a class="text-primary">Kalau masih gk bisa(biasanya yang pake HP nih bukanya), coba buka pakai laptop </li>
                                <li><a class="text-primary">Masih gk bisa ? saya yang panik, langsung kasih tau aja di grup whatsapp cari aja Reynaldi.</li>
                                
                </ol>
            </p>
         </main>
         <footer class="mastfoot mt-auto">
            <div class="inner">
               
            </div>
         </footer>
      </div>
  
@stop