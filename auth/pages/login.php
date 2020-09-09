<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

// Properti
$p_title = 'CRUD Testing';
$p_namepage = 'Login POS';

require_once(Route::getModelPath('auth'));

//Aksi
if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  list($ceklogin,$status) = AuthModel::Login($username,$password);

  if($ceklogin && $status == 0) {
    Route::redirect('success','Anda Sudah Login','module');
  } else if(!$ceklogin && $status == -5) {
    Route::redirect('failed','Anda Gagal Login','login');
  } else if(!$ceklogin && !$status) {
    Route::redirect('failed','User tidak ditemukan','login');
  }
}

// Form
$a_form[] = array('input' => 'text','name' => 'username', 'id' => null, 'label' => 'Username', 'value' => null ,'placeholder' => 'Username','required' => true, 'length' => null, 'icon' => 'envelope');
$a_form[] = array('input' => 'password','name' => 'password', 'id' => null, 'label' => 'Password', 'value' => null ,'placeholder' => 'Password', 'required' => false, 'length' => null, 'icon' => 'lock');

include(Route::getViewPath('include/forms_auth_list'));

?>
