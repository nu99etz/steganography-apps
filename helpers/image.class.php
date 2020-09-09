<?php

class Image {

  public static function getUploadImage($files,$dir = null,$size_limit = null) {
    if(!empty($files)) {
      $extension_permission = array('jpg','png');
      $name = $files['name'];
      $explode_extension = explode('.',$name);
      $extension = strtolower(end($explode_extension));
      $size = $files['size'];
      $tmp_file = $files['tmp_name'];
      $rename = 'upload'.date('Ymd-His').'.'.$extension;
      if(!empty($dir)) {
          $upload_dir_name = '../upload/'.$p_dir.'/'.$rename;
      } else if(empty($dir)) {
          $upload_dir_name = '../upload/'.'/'.$rename;
      }
      if(in_array($extension,$extension_permission) === true) {
        if(empty($size_limit)) {
          if($size < 2097152) {
            $upload_test = move_uploaded_file($tmp_file,$upload_dir_name);
          } else {
            $respond = array(
              'u_failed' => true,
              'messages' => 'Size File/Foto Terlalu Besar'
            );
          }
        } else if(!empty($size_limit)) {
            if($size < $size_limit) {
              $upload_test = move_uploaded_file($tmp_file,$upload_dir_name);
            } else {
              $respond = array(
                'u_failed' => true,
                'messages' => 'Size File/Foto Terlalu Besar'
            );
          }
        }
        if($upload_test) {
          $respond = array(
            'u_success' => true,
            'messages' => 'File/Foto Telah Terupload',
            'file_name' => $rename,
            'type' => $files['type']
          );
        } else {
          $respond = array(
            'u_failed' => true,
            'messages' => 'File/Foto Gagal Terupload '.$_FILES['photo']['error']
          );
        }
      }
    }
    return $respond;
  }
}

 ?>
