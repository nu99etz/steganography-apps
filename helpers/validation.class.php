<?php

class Validation {

  public static function validate($form,$isi) {

    $i=0;
    foreach($form as $key => $value) {
      if($value['required'] == true || $value['length'] != null) {
        if($isi[$i+1] == null) {
          $messages[] = 'Karakter Tidak Boleh Kosong';
        } else if(strlen($isi[i+1]) > $value['length']) {
          $messages[] = 'Karakter Lebih';
        } else if(strlen($isi[i+1]) < $value['length']) {
          $messages[] = 'Karakter Kurang';
        }
      }
      $i++;
    }
    return $form[0]['required'];
  }
}

 ?>
