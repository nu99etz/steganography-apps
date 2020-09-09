<?php

class BarangModel extends Model {

  const table = 'barang';
  const schema = 'master';

  public static function getBarangAll() {
    $barang = self::getAll();
    if(!empty($barang)) {
      $response = array(
        'status' => 'success',
        'data' => $barang
      );
    } else {
      $response = array(
        'status' => 'failed',
        'data' => $barang
      );
    }
    return Check::json($response);
  }
}
