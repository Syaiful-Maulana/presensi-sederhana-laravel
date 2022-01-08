<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title', 'Dashboard')</title>
    @include('Layout.head')
    @stack('css')
</head>
<body class="hold-transition sidebar-mini dark-mode" onload="realtimeClock()">
<div class="wrapper">

  <!-- Navbar -->
  @include('Layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  @include('Layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('Layout.script')
@stack('script')
</body>
</html>
