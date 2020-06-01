<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $p_title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/jqvmap/jqvmap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/daterangepicker/daterangepicker.css');?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/summernote/summernote-bs4.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/datatables-bs4/css/dataTables.bootstrap4.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/select2/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo Route::getAssetPath('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php require_once(Page::useLayout('navbar')); ?>
