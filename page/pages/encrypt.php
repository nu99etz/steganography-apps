<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

$custom_name = "Encrypt";
$custom_message = "Apakah Anda Yakin Mau Mengenkripsi Gambar Ini ??";
$permit = Permission::getPageCustomPermission($custom_name);

// Properti Halaman
$p_title = 'Steganography Encrypt Image';
$p_col = 12;
$p_namepage = 'Encrypt Image';
$permit["can.$custom_name"];

// Aksi
if(isset($_POST["$custom_name"])) {
  if(!empty($_FILES['foto']) && !empty($_POST['messages'])) {
      $upload = Image::getUploadImage($_FILES['foto'],null,'5097152');
      if($upload['u_success']) {
        //Check::debug_array($upload);
        Steganography::getEncrypt($upload,$_POST['messages']);
      } else if($upload['u_failed']) {
        Route::redirect('failed',$upload['messages'],Route::selfPage());
      }
  } else if(empty($_FILES['foto'])) {
    Route::redirect('failed','Foto Kosong',Route::selfPage());
  } else if(empty($_POST['messages'])) {
    Route::redirect('failed','Pesan Kosong',Route::selfPage());
  } else {
    Route::redirect('failed','Foto Dan Pesan Kosong',Route::selfPage());
  }
}

// Form
$a_form[] = array('input' => 'textarea','name' => 'messages', 'id' => null, 'label' => 'Tulis Pesan', 'value' => null ,'placeholder' => 'Tulis Pesan','required' => true, 'length' => null);
$a_form[] = array('input' => 'file','name' => 'foto', 'id' => null, 'label' => 'Silahkan Pilih Foto', 'value' => null ,'placeholder' => 'Foto', 'required' => false, 'length' => null);


// Ambil Layout
require_once(Page::getLayout('form'));

 ?>
