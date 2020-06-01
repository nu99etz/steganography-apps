<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

// Ada Aksi
if($c_add || $p_act == 'edit') {

  // Ada Aksi Tambah
  if(isset($_POST[$permit['actadd']])) {
    foreach($a_form as $form => $column){
      $in[] = $_POST[$column['name']];
    }
    if(!empty($_FILES)) {
        $extension_permission = array('jpg','png');
        $name = $_FILES['photo']['name'];
        $explode_extension = explode('.',$name);
        $extension = strtolower(end($explode_extension));
        $size = $_FILES['photo']['size'];
        $tmp_file = $_FILES['photo']['tmp_name'];
        $rename = $in[0].'.'.$extension;
        $upload_dir_name = '../upload/'.$p_dir.'/'.$rename;
        if(in_array($extension,$extension_permission) === true) {
          if($size < 2097152) {
            $upload_test = move_uploaded_file($tmp_file,$upload_dir_name);
            if($upload_test) {
              $respond = array(
                'u_success' => true,
                'messages' => 'File/Foto Telah Terupload'
              );
            } else {
              $respond = array(
                'u_failed' => true,
                'messages' => 'File/Foto Gagal Terupload '.$_FILES['photo']['error']
              );
            }
          } else {
            $respond = array(
              'u_failed' => true,
              'messages' => 'Size File/Foto Terlalu Besar'
            );
          }
        } else {
          $respond = array(
            'u_failed' => true,
            'messages' => 'Extensi File/Foto Dilarang Diupload disini'
          );
      }
    } else if(empty($_FILES)) {
          $record = array(null);
          foreach($in as $n)
            array_push($record,$n);
          array_push($record,$_SERVER['REMOTE_ADDR'],1);
          //Check::debug_array($record);
          Page::pageInsert($record,$p_model);
    }
      if($respond) {
        foreach($respond as $key => $val)
          eval('$'.$key.' = $val;');
        if($u_success) {
          $dir_upload = $rename;
          $inz = count($in);
          $in[$inz-1] = $dir_upload;
          $record = array(null);
          foreach($in as $n)
            array_push($record,$n);
          array_push($record,$_SERVER['REMOTE_ADDR'],1);
          Page::pageInsert($record,$p_model);
        } else if($u_failed) {
          Route::redirect('failed',$messages,Route::selfPage());
        }
      }

  } else if(isset($_POST[$permit['actupdate']])) {
    foreach($_POST as $key => $val)
      eval('$'.$key.' = $val; ');
      $record = array(null,$nik,$role,$_SERVER['REMOTE_ADDR'],1);
      Page::pageUpdate($record,$p_model,$id);
  }
} //else if($p_act == 'delete') {
  // Ada Aksi hapus
  //if(isset($_POST[$permit['actdelete']])) {
  //  $id = $_POST['id'];
  //  Page::pageDelete($p_model,$id);

  //}
//}


 ?>
