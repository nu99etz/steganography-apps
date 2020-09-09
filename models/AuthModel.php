<?php

class AuthModel extends Model {

  const table = 'user';
  const schema = 'auth';

  public static function Login($username,$password) {

    $conn = self::connect();
    $sql = "select*from ".static::getTable()." where username = '$username' and password = '$password' ";
    $cekuser = $conn->GetRow($sql);
    // Check::debug($cekuser);
    if(!empty($cekuser)) {
      Auth::setLoginStatus();
      Auth::setUsername($username);
      return array(true,$conn->ErrorNo());
    } else if(empty($cekuser)) {
      return array(false,false);
    } else {
      return array(true,$conn->ErrorNo());
    }
  }


}
