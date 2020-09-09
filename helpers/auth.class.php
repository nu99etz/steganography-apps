<?php

class Auth {

  public static function isLogin() {
    $login = self::getLoginStatus();
    if($login) {
      return true;
    } else {
      return false;
    }
  }

  public static function Logout() {
    session_destroy();
    ob_clean();
  }

  public static function setLoginStatus() {
    $_SESSION['POS']['login'] = true;
  }

  public static function getLoginStatus() {
    return $_SESSION['POS']['login'];
  }

  public static function setUsername($data) {
    $_SESSION['POS']['login']['username'] = $data;
  }

  public static function getUsername() {
    return $_SESSION['POS']['login']['username'];
  }
}

?>
