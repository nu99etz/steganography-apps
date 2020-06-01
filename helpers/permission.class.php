<?php

class Permission {

  public static function getPagePermission() {
    $permission['canread'] = true;
    $permission['canadd'] = true;
    $permission['candelete'] = true;
    $permission['canupdate'] = true;
    $permission['actadd'] = 'Tambah';
    $permission['actupdate'] = 'Update';
    $permission['actdelete'] = 'Hapus';
    return $permission;
  }

  public static function getPageCustomPermission($custom_name) {
    $permission["can.$custom_name"] = true;
    $permission["act.$custom_name"] = $custom_name;
    return $permission;
  }
}

 ?>
