<?php

define('__VALID_ENTRANCE', 1);

include('../config/autoload.php');

ob_start();

session_start();

if($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
    error_reporting(0);
}

error_reporting(0);

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);

$halaman = @$_GET['param'];
$halamanpath = explode('/', $halaman);

// Variabel
$page = $halamanpath[0];
$id = $halamanpath[2];
$p_act = $halamanpath[1];

if(empty($page)) {
  $page = 'all';
}

// Cek Authentikasi Dulu
if(!Auth::isLogin()) {
  Route::redirect('failed','Anda harus login dulu','../auth/login');
}

// Ambil Halaman
$pagedir = Route::getViewPath($page);
if(is_readable($pagedir)) {
  require_once($pagedir);
} else {
  $p_error = '404';
  $p_title = 'Not Found';
  require_once(Route::getViewPath('include/error_status'));
}

// Jika Jumlah Parameter URL lebih dari 3 Direct Ke Error page
if(count($halamanpath) > 3) {
  $p_error = '404';
  $p_title = 'Not Found';
  require_once(Route::getViewPath('include/error_status'));
}


?>
