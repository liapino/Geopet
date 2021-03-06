<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  @yield('css')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/general.css') }}">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ route('front') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 4 mensajes</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ asset('bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="Avatar">
                      </div>
                      <h4>
                        {{ auth()->user()->name }}
                        <small><i class="fa fa-clock-o"></i> 5 min</small>
                      </h4>
                      <p>Mensaje...</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todos los mensajes</a></li>
            </ul>
          </li>-->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              @if($count = Auth::user()->unreadNotifications->count())
              <span class="label label-warning">{{ $count }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes {{ $count }} notificaciones</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  @foreach(Auth::user()->unreadNotifications->take(3) as $notification)
                  <li><!-- start notification -->
                    <a href="{{ route( 'notifications.show', ['message_id'=>$notification->data['id'], 'notification_id'=>$notification->id]) }}">
                      <i class="fa fa-users text-aqua"></i> {{ $notification->data['subject'] }}
                    </a>
                  </li>
                  @endforeach
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="{{ route('notifications.index') }}">Ver todas</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ Storage::url(auth()->user()->avatar) }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ auth()->user()->name. ' ' . auth()->user()->lastname }}</span>
            </a>
            <ul class="dropdown-menu">

            <li><a href="{{ route('account', auth()->user()->id) }}" class="btn btn-defaul btn-block btn-flat" style="color:black;">Mi cuenta</a></li>
            
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <li><button type="submit" class="btn btn-default btn-block btn-flat">Cerrar sesión</button></li>
            </form>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Storage::url(auth()->user()->avatar) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name. ' ' . auth()->user()->lastname }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> {{ auth()->user()->role->display_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ</li>
        <li class="{{ request()->is('home') ? 'active':''}}"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
        @if(auth()->user()->hasRoles(['client',]))
        <li class="{{ request()->is('pets*') ? 'active':''}}"><a href="{{ route('pets.index') }}"><i class="fa fa-paw"></i> <span>Mascostas</span></a></li>
        @endif
        @if(auth()->user()->hasRoles(['admin',]))
        <li class="{{ request()->is('users*') ? 'active':''}}"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        <li class="{{ request()->is('products*') ? 'active':''}}"><a href="{{ route('products.index') }}"><i class="fa fa-cubes"></i> <span>Productos</span></a></li>
        <li class="{{ request()->is('faqs*') ? 'active':''}}"><a href="{{ route('faqs.index') }}"><i class="fa fa-info-circle"></i> <span>Preguntas Frecuentes</span></a></li>
        <li class="{{ request()->is('options*') ? 'active':''}}"><a href="{{ route('options') }}"><i class="fa fa-cog"></i> <span>Ajustes</span></a></li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Versión 0.7.5
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">{{ config('app.name') }}</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Settings tab content -->
      <div class="tab-pane active" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Ajustes</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Color:
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <button class="btn btn-default btn-xs pull-right" type="button">Aplicar</button>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
@yield('js')
<script src="{{ asset('js/general.js') }}"></script>
</body>
</html>