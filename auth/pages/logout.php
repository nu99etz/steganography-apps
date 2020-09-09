<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Auth::Logout();

session_start();

Route::redirect('success','anda sudah keluar','../auth/login');

?>
