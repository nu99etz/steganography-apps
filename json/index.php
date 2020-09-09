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

//Check::debug($halamanpath);

$json_key = "de4621018fb84553f758f26c2c831a52";

if(empty($p_act) and empty($page)) {
  $response = array(
    'status' => 'akses ditolak',
    'messages' => 'akses token dan halaman kosong'
  );
  Check::json($response);
} else if (!empty($p_act) and !empty($page)){
  if($p_act == $json_key) {
    // Ambil Halaman
    $pagedir = Route::getViewPath($page);
    if(is_readable($pagedir)) {
      require_once($pagedir);
    } else {
      $p_error = '404';
      $p_title = 'Not Found';
      require_once(Route::getViewPath('include/error_status'));
    }
  } else {
    $response = array(
      'status' => 'akses ditolak',
      'messages' => 'akses token salah'
    );
    Check::json($response);
  }
} else if(empty($p_act)) {
  $response = array(
    'status' => 'akses ditolak',
    'messages' => 'akses token kosong'
  );
  Check::json($response);
}

// Jika Jumlah Parameter URL lebih dari 3 Direct Ke Error page
if(count($halamanpath) > 3) {
  $p_error = '404';
  $p_title = 'Not Found';
  require_once(Route::getViewPath('include/error_status'));
}


?>
