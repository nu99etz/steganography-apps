<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

$custom_name = "Decrypt";
$custom_message = "Apakah Anda Yakin Mau Mendekripsi Gambar Ini ??";
$permit = Permission::getPageCustomPermission($custom_name);

// Properti Halaman
$p_title = 'Steganography Decrypt Image';
$p_col = 12;
$p_namepage = 'Decrypt Image';
$permit["can.$custom_name"];

// Aksi
if(isset($_POST["$custom_name"])) {
  if(!empty($_FILES['foto'])) {
      Steganography::getDecrypt($_FILES['foto']);
  } else if(empty($_FILES['foto'])) {
    Route::redirect('failed','Foto Kosong',Route::selfPage());
  }
}

// Form
//$a_form[] = array('input' => 'textarea','name' => 'messages', 'id' => null, 'label' => 'Tulis Pesan', 'value' => null ,'placeholder' => 'Tulis Pesan','required' => true, 'length' => null);
$a_form[] = array('input' => 'file','name' => 'foto', 'id' => null, 'label' => 'Silahkan Pilih Foto', 'value' => null ,'placeholder' => 'Foto', 'required' => false, 'length' => null);


// Ambil Layout
require_once(Page::getLayout('form'));

 ?>
