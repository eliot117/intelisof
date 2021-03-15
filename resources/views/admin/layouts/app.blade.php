<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Administrativo</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Styles -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div id="app">
        <div class="wrapper">

        @include('admin.layouts.partials.navbar')

        @include('admin.layouts.partials.navbar-lateral')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                            <h3 class="card-title">@yield('subtitle')</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            @yield('validation')
                            @yield('content')
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.row -->
                </div>
            <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="#">Intelisof Tecnologia y Software</a></strong>
            Todos los derechos reservados.
            <!--<div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0-rc
            </div>-->
        </footer>
        </div>
    </div>
    <!-- ./wrapper -->
    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <!-- page script -->
    @yield('js')
</body>
</html>
