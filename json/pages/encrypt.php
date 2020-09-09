<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

$custom_name = "Simpan";
$custom_message = "Apakah Anda Yakin Mau Menyimpan Data Ini ??";
$permit = Permission::getPageCustomPermission($custom_name);

// Properti Halaman
$p_title = 'CRUD Testing';
$p_col = 12;
$p_namepage = 'CRUD';
$permit["can.$custom_name"];

require_once(Route::getModelPath('testing'));

// Form
// $a_form[] = array('input' => 'text','name' => 'test', 'id' => null, 'label' => 'Tulis Pesan', 'value' => null ,'placeholder' => 'Tulis Pesan','required' => true, 'length' => null);
$a_form[] = array('input' => 'date','name' => 'name', 'id' => null, 'label' => 'Nama', 'value' => null ,'placeholder' => 'Tulis Nama','required' => true, 'length' => null);
$a_form[] = array('input' => 'textarea','name' => 'alamat', 'id' => null, 'label' => 'Alamat', 'value' => null ,'placeholder' => 'Tulis Alamat', 'required' => false, 'length' => null);

// Aksi
// if(isset($_POST["$custom_name"])) {
//   $record = Page::getPostDetail($a_form,$_POST);
//   Page::pageInsert('mTesting',$record);
// }

// Ambil Layout
include(Route::getViewPath('include/forms_list'));

 ?>
