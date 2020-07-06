<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-4886889-8"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-4886889-8');
        </script>        
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('sabre-tema/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sabre-tema/js/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sabre-tema/fonts/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('sabre-tema/css/orionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('sabre-tema/css/style/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('sabre-tema/iconic/css/open-iconic-bootstrap.css') }}">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->

    <script src="{{ asset('sabre-tema/js/Chart.bundle.min.js')}}"></script>

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="32x32">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <title>@yield('titulo')</title>
    </head>

    <body>
      <style>
        .page-holder{
          background-image: url("{{ asset('img/fundo.jpg') }}");
          background-size: cover;
        }
        .caret{
          border-top: 4px solid;
        }
      </style>
      <header class="header">
        <nav class="navbar navbar-expand-md navbar-light">
          <!-- Brand -->
          <a class="navbar-brand" href="{{ route('site.home') }}">Sabre</a>
        
          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
              </li>
              <!-- Dropdown -->
              <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                  Dropdown link
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Link 3</a>
                  <a class="dropdown-item" href="#">Link 4</a>
                  <a class="dropdown-item" href="#">Link 5</a>
                </div>
              </li>
            </ul>
          </div>
        </nav> 
      </header>
      <div class="d-flex align-items-stretch">
        <div class="page-holder w-100 d-flex flex-wrap">
          <div class="container-fluid">
            <section>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">