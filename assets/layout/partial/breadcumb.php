<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

$pecah = explode('/',$_SERVER['REQUEST_URI']);
$link = ucwords($pecah[2]);

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php echo $p_namepage;?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo $config['app_path'].'/'.$pecah[2];?>"><?php echo $link;?></a></li>
            <li class="breadcrumb-item active"><?php echo $p_namepage;?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
