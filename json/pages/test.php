<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

require_once(Route::getModelPath('testing'));

$all = TestingModel::getAll();

$record = array(
  'id' => '',
  'name' => "Joker",
  'alamat' => "Wonokromo"
);

$insert = mTesting::recInsert($record);

Check::debug($insert);
 if($insert) {
   echo "Success";
 } else {
   echo "Failed";
 }
