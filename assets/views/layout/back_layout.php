<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Page::useLayout('html');

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
        <?php include(Route::getViewPath('partial/message')); ?>

      <!-- Notifications Dropdown Menu -->
        <?php include(Route::getViewPath('partial/notification')); ?>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php include(Route::getViewPath('partial/sidebar')); ?>

     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
       <!-- Content Header (Page header) -->
        <?php include(Route::getViewPath('partial/breadcumb')); ?>
       <!-- /.content-header -->

       <!-- Main content -->
    <section class="content">

      <?php echo array_pop($content) ;?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include(Route::getViewPath('partial/footer')); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  </body>
<?php Page::buildLayout(); ?>
