<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

// Properti Halaman
$p_title = 'POS - Master - Barang';
$p_col = 12;
$p_namepage = 'Master Barang';
$permit["can.$custom_name"];

require_once(Route::getModelPath('Barang'));

BarangModel::getBarangAll();

?>
