<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pegawai Perusahaan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template1/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template1/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template1/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <!-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Data Perusahaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template1/dist/img/unknown.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
        
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/pegawai" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Pegawai
               
              </p>
            </a>
          </li>

          @if (Auth::check() && Auth::user()->level == 'admin')
          

          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manajemen User
               
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a href="/dokumen" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Data Dokumen
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="https://wa.me/6282245953995?text=How?" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Contact Me
               
              </p>
            </a>
</li>

          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Logout
               
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('template1/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template1/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template1/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template1/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('template1/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('template1/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('template1/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('template1/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template1/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template1/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template1/dist/js/pages/dashboard2.js') }}"></script>
</body>
</html>
