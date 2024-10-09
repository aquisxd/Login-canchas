<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Reserva de Canchas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
  
  <!-- Iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- jQuery -->

  <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <!-- Data Table -->
  <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
</head>
<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">


<div class="wrapper">


  <!-- /.navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin') }}" class="nav-link">Sistema de Reserva de Canchas</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 solicitudes de amistad
            <span class="float-right text-muted text-sm">12 horas</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nuevos informes
            <span class="float-right text-muted text-sm">2 días</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="sidebar-dark-success" >
    <a href="index3.html" class="brand-link">
      <img src="{{ url('dist/img/Insignia.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> San Miguel</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
        </div>
      </div>
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-is-opening menu-open"">
                <a href="#" class="nav-link active">
                    <i class="nav-icon bi bi-person-fill"></i>
                    <p>
                        Usuarios
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                    <li class="nav-item">
                        <a href="{{ url('admin/usuarios/create') }}" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Creación de Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/usuarios') }}" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listado de Usuarios</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   style="background-color: red; color: white; display: flex; align-items: center; padding: 10px; border-radius: 5px;">
                    <i class="nav-icon bi bi-box-arrow-left" style="margin-right: 5px;"></i>
                    Cerrar Sesión
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>

    </div>
  </aside>

  @if (Session::has('mensaje') && Session::has('icono'))
    @php
        $message = Session::get('mensaje');
        $icono = Session::get('icono');
    @endphp
    <script>
        Swal.fire({
            position: 'center',
            icon: '{{$icono}}',
            title: '{{$message}}',
            showConfirmButton: false,
            timer: 3500
        });
    </script>
  @endif

  <div class="content-wrapper">
    <br>
    <div class="container">
        @yield('content')
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <div id="sidebar-overlay"></div></div>
  <!-- Bootstrap 4 -->
  <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables -->
  <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- AdminLTE App -->

  <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
  
  <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
</body>
</html>
