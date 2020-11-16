<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <!-- Date Picker CSS -->
  <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- ./wrapper -->
@yield('main')
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/js/app.js') }}"></script>
{{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
<!-- Bootstrap -->
{{-- <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script> --}}
<!-- overlayScrollbars -->
<script src="{{ asset('js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('js/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('js/raphael.min.js')}}"></script>
<script src="{{ asset('js/jquery.mapael.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('js/Chart.min.js')}}"></script>
{{-- <script src="{{ asset('js/dashboard2.js')}}"></script> --}}
<script src="{{ asset('js/select2.min.js')}}"></script>

<!-- Date Picket JS -->
<script src="{{ asset('js/datepicker.js')}}"></script>
<script src="{{ asset('js/moment.min.js')}}"></script>

<script src="{{ asset('js/demo.js')}}"></script>
<script src="{{ asset('js/script.js')}}"></script>
@yield('js')
</body>
</html>
