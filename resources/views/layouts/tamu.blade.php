<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ isset($title) ? $title.' | '.config('app.name') : config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/scss/style.css">
</head>
<body class="hold-transition">
<!-- As a link -->
@include('layouts.inc_tamu.navbar')

<div class="text-center banner-hotel">
    <h1>Selamat Datang <br> Di HotelSsgit</h1>
    <p>Aman Nyaman Dan Bersahabat</p>
    {{--  <img src="{{ url('images/banner.jpg')}}" class="img img-fluid w-100">  --}}
</div>

<div class="container content">
@yield('content')
</div>

<footer class="footer">
    <div class="container ">
        <span class="row border-top justify-content-center align-items-center"><strong>Copyright &copy; 2022 Ssgit.</strong> All rights reserved.</span>
    </div>
</footer>

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
