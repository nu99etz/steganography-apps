<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

//Properti
$p_title = 'POS Module';
$p_namepage = '<center>Silahkan Pilih Modul Yang DIbutuhkan</center>';

Page::useLayout('html');

?>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="../../index3.html" class="navbar-brand">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">POS Module</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      </div>

  </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php include(Route::getViewPath('partial/breadcumb'));?>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <?php if(!empty($_SESSION['POS']['FLASH'])) {
        foreach($_SESSION['POS']['FLASH'] as $key => $val){
          eval('$'.$key.' = $val;');
        }
        if($post_ok) {
          $post_color = $color;
          $post_msg = $msg;
        } else if($post_err) {
          $post_color = $color;
          $post_msg = $msg;
        }
        ?>
        <div class="alert alert-<?php echo $post_color;?> alert-dismissible fade show" role="alert">
          <?php echo $post_msg;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php  unset($_SESSION['POS']['FLASH']); } ?>
      <div class="row">
        <!-- Akses Role MOdule Untuk Diforeach -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <p> </p>
              <p> </p>
              <h3>Penjualan</h3>
              <p> </p>
              <p> </p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="../page/" class="small-box-footer">
              Penjualan <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- Batas Akses Role Untuk DI Foreach -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include(Route::getViewPath('partial/footer')) ;?>

</div>
</body>

<?php Page::buildLayout(); ?>
