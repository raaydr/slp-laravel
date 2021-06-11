@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('tes')
<body class="text-center">
      <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
         <header class="masthead mb-auto">
            <div class="inner">
               <h3 class="masthead-brand">Error 429</h3>
            </div>
         </header>
         <main role="main" class="inner cover">
            <h1 class="cover-heading">Kenapa bisa begini ???</h1>
            <p class="lead">Too Many Request, sabar ya satu-satu</p>
            
         </main>
         <footer class="mastfoot mt-auto">
            <div class="inner">
               
            </div>
         </footer>
      </div>
@stop
