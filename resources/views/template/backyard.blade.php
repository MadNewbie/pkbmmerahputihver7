<?php
    use App\Libraries\Mad\Helper;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard<?php echo(isset($modelName) ? ' - ' . ucwords($modelName): '') ?></title>
    @yield('css-include-before')
    <!--Alertify-->
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/alertify.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/themes/bootstrap.min.css')}}">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{asset('vendor/adminlte/css/adminlte.min.css')}}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{asset('css/backyard.css')}}">
    @yield('css-include-after')
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-danger">
            <!-- Left navbar group -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar group -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <span class="user__name">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="dropdown-item" href="<?= route('logout') ?>">
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Sidebar Container-->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-danger">
            <!-- Brand Logo -->
            <a href="/" class="brand-link bg-danger">
                <img class="brand-image elevation-3" src="{{asset('image/logo.png')}}" alt="log-merah-putih">
                <span class="brand-text font-weight-light">
                    PKBM Merah Putih
                </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php
                            $menus = require base_path('resources/views').'/menu.php';
                            echo(Helper::renderMenus($menus));
                        ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                @yield('page-header')
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                PKBM Merah Putih Kabupaten Karangploso
            </div>
        </footer>
    </div>
    <!-- Javascript -->
    <!-- JQuery -->
    <script src="{{asset('vendor/jquery/js/jquery.min.js')}}"></script>
    <!--Alertify-->
    <script src="{{asset('vendor/alertifyjs/js/alertify.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('vendor/adminlte/js/adminlte.min.js')}}"></script>
    <script type="text/javascript">
        @yield('js-inline-data')
    </script>
    @yield('js-include')
    <script type="text/javascript">
            @yield('js-inline')
            $(function () {
                @if(isset($notifMessage['success']))
                    alertify.success('<?= $notifMessage['success'] ?>');
                @endif
                @if(isset($notifMessage['error']))
                    alertify.error('<?= $notifMessage['error'] ?>');
                @endif
                @if(isset($notifMessage['warning']))
                    alertify.notify('<?= $notifMessage['warning'] ?>', 'yellow');
                @endif
                @if(isset($notifMessage['info']))
                    alertify.notify('<?= $notifMessage['info'] ?>', 'blue');
                @endif
                @if($message = Session::get('success'))
                    alertify.success('<?= $message ?>');
                @endif
                @if($message = Session::get('error'))
                    alertify.error('<?= $message ?>');
                @endif
                @if($message = Session::get('warning'))
                    alertify.notify('<?= $message ?>', 'yellow');
                @endif
                @if($message = Session::get('info'))
                    alertify.notify('<?= $message ?>', 'blue');
                @endif
                @if(isset($errors) && count($errors) > 0)
                    <?php
                    $message = implode('</br>', $errors->all());
                    ?>
                    alertify.error('<?= $message ?>');
                @endif
            })
        </script>
</body>
</html>