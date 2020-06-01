<?php

define('__VALID_ENTRANCE', 1);

include('../config/autoload.php');

ob_start();

session_start();

if($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
    error_reporting(0);
}

error_reporting(0);

//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);

$halaman = @$_GET['param'];
$halamanpath = explode('/', $halaman);

// Variabel
$id = $halamanpath[2];
$p_act = $halamanpath[1];

// Jika Jumlah Array Halaman Lebih dari 3 Direct Ke Error Page
if(count($halamanpath) > 3) {
  $p_title = 'Halaman Tidak Ditemukan';
  $p_namepage = 'Halaman Tidak Ditemukan';
  require_once(Page::getErrorCode('404'));
}

if($halamanpath[0] == null) {
   require_once(Page::usePage('encrypt'));
} else if($halamanpath[0] != null && $halamanpath[1] == null) {
    require_once(Page::usePage($halamanpath[0]));
} else if($halamanpath[0] != null && $halamanpath[1] == 'delete'){
    require_once(Page::usePage($halamanpath[0]));
} else if($halamanpath[0] != null && $halamanpath[1] == 'update'){
    require_once(Page::usePage($halamanpath[0]));
} else if($halamanpath[0] != null && $halamanpath[1] == 'detail'){
    require_once(Page::usePage($halamanpath[0]));
} else {
    $p_title = 'Halaman Tidak Ditemukan';
    $p_namepage = 'Halaman Tidak Ditemukan';
    require_once(Page::getErrorCode('404'));
}


?>
