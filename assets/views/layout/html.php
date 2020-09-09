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
  <!-- jQuery -->
  <script src="<?php echo Route::getAssetPath('plugins/jquery/jquery.min.js');?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo Route::getAssetPath('plugins/jquery-ui/jquery-ui.min.js');?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo Route::getAssetPath('plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo Route::getAssetPath('plugins/chart.js/Chart.min.js');?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo Route::getAssetPath('plugins/sparklines/sparkline.js');?>"></script>
  <!-- JQVMap -->
  <script src="<?php echo Route::getAssetPath('plugins/jqvmap/jquery.vmap.min.js');?>"></script>
  <script src="<?php echo Route::getAssetPath('plugins/jqvmap/maps/jquery.vmap.usa.js');?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo Route::getAssetPath('plugins/jquery-knob/jquery.knob.min.js');?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo Route::getAssetPath('plugins/moment/moment.min.js');?>"></script>
  <script src="<?php echo Route::getAssetPath('plugins/daterangepicker/daterangepicker.js');?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo Route::getAssetPath('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
  <!-- Summernote -->
  <script src="<?php echo Route::getAssetPath('plugins/summernote/summernote-bs4.min.js');?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo Route::getAssetPath('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo Route::getAssetPath('js/adminlte.js');?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo Route::getAssetPath('js/pages/dashboard.js');?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo Route::getAssetPath('js/demo.js');?>"></script>
  <!-- DataTables -->
  <script src="<?php echo Route::getAssetPath('plugins/datatables/jquery.dataTables.js');?>"></script>
  <script src="<?php echo Route::getAssetPath('plugins/datatables-bs4/js/dataTables.bootstrap4.js');?>"></script>
  <!-- jquery-validation -->
  <script src="<?php echo Route::getAssetPath('plugins/jquery-validation/jquery.validate.min.js');?>"></script>
  <script src="<?php echo Route::getAssetPath('plugins/jquery-validation/additional-methods.min.js');?>"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo Route::getAssetPath('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js');?>"></script>
  <!-- Select2 -->
  <script src="<?php echo Route::getAssetPath('plugins/select2/js/select2.full.min.js');?>"></script>
  <!-- Date Picker -->
  <script src="<?php echo Route::getAssetPath('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js');?>"></script>
  <!-- BootBox -->
  <script src="<?php echo Route::getAssetPath('plugins/bootbox/bootbox.min.js');?>"></script>
  <script src="<?php echo Route::getAssetPath('plugins/bootbox/bootbox.locales.min.js');?>"></script>
  <!-- bs-custom-file-input -->
  <script src="<?php echo Route::getAssetPath('plugins/bs-custom-file-input/bs-custom-file-input.min.js');?>"></script>
</head>
  <?php echo array_pop($content);?>
</html>
