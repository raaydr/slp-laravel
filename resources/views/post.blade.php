<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>SLP Indonesia - Artikel</title>

    

    

    <!-- Bootstrap core CSS -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <!-- Favicons -->
    <link href="{{asset('develop')}}/img/slp.png" rel="icon">
  <link href="{{asset('develop')}}/img/logo.png" rel="apple-touch-icon">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('develop')}}/css/blog.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      @if ((app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName())== 'admin.listBlog')
          <a class="link-secondary" href="{{ route('admin.listBlog') }}">back</a>
      @else
          <a class="link-secondary" href="{{ route('compro') }}">back</a>
      @endif
        
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#"><img src="{{asset('develop')}}/img/logo.png" class="img-fluid" alt="Responsive image" width="150" ></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
      @auth
      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus blog ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-danger">Ya</button>
      </div>
    </div>
  </div>
</div>

      @endauth
      
      </div>
    </div>
  </header>
</div>

<main class="container">
  <div class="row g-5">
    <div class="col-md-12">
      

      <article class="blog-post">
        <h2 class="blog-post-title text-center m-2">{{$blog->judul}}</h2>
        <p class="blog-post-meta text-center m-3">{{$tanggalbaru}}, By <a class="text-success">{{$blog->nama}}</a></p>
        <?php
          echo $blog->artikel ;
        ?>
<p class="blog-post-meta text-center m-3"><a class="text-primary"  href="{{$blog->link_instagram}}" target="_blank">Komeng Disini</a></p>
    </div>

  </div>

</main>

<footer class="blog-footer">
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>


    
  </body>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</html>
