<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php
          echo isset($toolbar_title) ? "{$toolbar_title} : " : '';
          e($this->settings_lib->item('site.title'));
          ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <link rel="stylesheet" href="<?= site_url('assets/plugins/ligthbox2/css/lightbox.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/toastr/toastr.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= site_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') ?>">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= site_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
  <!-- NProcess -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/nprogress/nprogress.css') ?>">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= site_url('assets/dist/css/adminlte.min.css') ?>">
  <style>
    .error {
      color: red;
    }
  </style>
  <?php echo Assets::css(); ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <?php echo theme_view('menu/topleft_menu'); ?>
      <?php echo theme_view('menu/searchbar'); ?>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <?php //echo theme_view('menu/messages'); 
        ?>
        <!-- Notifications Dropdown Menu -->
        <?php //echo theme_view('menu/notifications'); 
        ?>

        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="https://i.pinimg.com/originals/7c/c7/a6/7cc7a630624d20f7797cb4c8e93c09c1.png" class="user-image img-circle" alt="User Image">
            <span class="d-none d-md-inline"><i class="fa fa-chevron-down"></i></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-secondary">
              <img src="https://i.pinimg.com/originals/7c/c7/a6/7cc7a630624d20f7797cb4c8e93c09c1.png" class="img-circle elevation-0" alt="User Image">

              <p>
                <?php
                if (isset($current_user)) {
                  $userDisplayName = isset($current_user->display_name) && !empty($current_user->display_name) ? $current_user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $current_user->username : $current_user->email);
                  echo $userDisplayName;
                }
                ?>
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->

        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="<?= site_url('users/profile'); ?>" class="btn btn-default btn-flat"><i class="far fa-user mr-2"></i>Profile</a>
          <a href="<?= site_url('logout') ?>" class="btn btn-default btn-flat float-right"><i class="fas fa-power-off mr-2"></i>Sign out</a>
        </li>
      </ul>
      </li>
      <!-- <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
        class="fas fa-th-large"></i></a>
    </li> -->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-1">
      <!-- Brand Logo -->
      <a href="<?= site_url() ?>" class="brand-link">
        <img src="<?= site_url('assets/dist/img/boxed-bg.png') ?>" alt="Vansales Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
        <span class="brand-text font-weight-light">MAHATHUEN</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar nav-legacy flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php echo theme_view('menu/mainmenu'); ?>
            <?php // Template::block('sub_nav', ''); 
            ?>
          </ul>
        </nav>

        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">
                <?= $toolbar_title ?? ucfirst($this->router->fetch_class()) ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                <li class="breadcrumb-item active">
                  <?php if (isset($toolbar_title)) {
                    echo $toolbar_title;
                  } else {
                    echo ucfirst($this->router->fetch_class());
                  } ?>
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?php
          echo Template::message();
          echo isset($content) ? $content : Template::content();
          ?>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Version <?php echo BONFIRE_VERSION; ?>
      </div>
      <!-- Default to the left -->
      <!-- Executed in {elapsed_time} seconds, using {memory_usage} -->
      Copyright &copy; <?= date('Y') ?> <a href="https://mahathuen.com">https://mahathuen.com</a></strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= site_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= site_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Select2 -->
  <script src="<?= site_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
  <!-- NProcess -->
  <script src="<?= site_url('assets/plugins/nprogress/nprogress.js') ?>"></script>
  <!-- validation -->
  <script src="<?= site_url('assets/plugins/jquery-validation/jquery.validate.js'); ?>" type="text/javascript"></script>
  <script src="<?= site_url('assets/plugins/jquery-validation/additional-methods.js'); ?>" type="text/javascript"></script>
  <!-- InputMask -->
  <script src="<?= site_url('assets/plugins/moment/moment.min.js') ?>"></script>
  <script src="<?= site_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') ?>"></script>
  <!-- date-range-picker -->
  <script src="<?= site_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
  <!-- DataTables -->
  <script src="<?= site_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= site_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= site_url('assets/plugins/datatables-responsive/js/dataTables.responsive.js') ?>"></script>
  <script src="<?= site_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.js') ?>"></script>
  <!-- SweetAlert2 -->
  <script src="<?= site_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
  <script src="<?= site_url('assets/plugins/ligthbox2/js/lightbox.js') ?>"></script>
  <!-- Toastr -->
  <script src="<?= site_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
  <!-- InputMask -->
  <script src="<?= site_url('assets/plugins/moment/moment.min.js') ?>"></script>
  <script src="<?= site_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') ?>"></script>
  <script src="<?= site_url("assets/plugins/number/jquery.number.min.js"); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= site_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <script language="javascript">
    /*  Check All Feature */
    $(".check-all").click(function() {
      $("table input[type=checkbox]").attr('checked', $(this).is(':checked'));
    });
  </script>
  <div id="debug">
    <!-- Stores the Profiler Results -->
  </div>
  <?php echo Assets::js(); ?>
  <?php if (isset($script_file)) {
    echo $this->load->view($script_file);
  }
  ?>
</body>

</html>