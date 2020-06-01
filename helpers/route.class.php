<?php

/**
 * Kumpulan Fungsi Routing
 *
 * @author nugraha
*/

include('../config/config.php');

class Route {

    /*
    * Routing untuk menentukan path model yang dibutuhkan
    * @$name = string
    * @$add = string (opsional)
    */
    public static function getModelPath($name, $add = null){
        global $config;

        return $config['app_models'] . 'm_' . strtolower($name) . '.php';
    }

    /*
    * Routing untuk menentukan path helper yang dibutuhkan
    * @$name = string
    * @$add = string (opsional)
    */
    public static function getHelpersPath($name, $add = null){
        global $config;

        return $config['app_helper'] . strtolower($name) . '.class.php';
    }

    /*
    * Routing untuk menentukan path asset yang dibutuhkan
    * @$name = string
    * @$add = string (opsional)
    */
    public static function getAssetPath($name, $add = null) {
        global $config;

        return $config['app_asset'] . $name;
    }

    /*
    * Routing untuk menentukan path upload yang dibutuhkan
    * @$dir = string
    * @$namefile = string
    */
    public static function getUploadPath($dir,$namefile) {
      global $config;

      //if(is_dir($dir)) {
        return $config['app_uploads'].$dir.'/'.$namefile;
      //}

    }

    /*
    * Routing untuk mendapatkan alamat URL Statis
    * @return $destination, $destination_link
    */
    public static function navAddress() {
        $linkaddress = explode('/',$_SERVER['REQUEST_URI']);
        $destination_link = explode('_',$linkaddress[3]);
        $destination = 'data_'.$destination_link[1];
        if(count($linkaddress) == 4) {
          return $destination.'/';
        } else if(count($linkaddress) == 5) {
          return '../'.$destination.'/';
        } else if($linkaddress == 3) {
          return $destination_link;
        }
    }

    /*
    * Routing untuk hapus record
    * @$param = string
    */
    public static function Delete($param) {
        return "delete/" . $param;
    }

    public static function Edit($form,$param) {
        return self::navAddress()."update/" . $param;
    }

    public static function View($form,$param) {
        return self::navAddress()."detail/" . $param;
    }

    public static function Tambah() {
        return self::navAddress();
    }

    public static function backToPage() {
      $linkaddress = explode('/',$_SERVER['REQUEST_URI']);
      $destination_link = explode('_',$linkaddress[3]);
      $destination = 'list_'.$destination_link[1];
      if(count($linkaddress) == 4) {
        return $destination.'/';
      } else if(count($linkaddress) == 5) {
        return '../'.$destination.'/';
      } else if($linkaddress == 3) {
        return $destination_link;
      }
    }

    public static function selfPage() {
      $explode_link = explode('/',$_SERVER['REQUEST_URI']);
      $rim = count($explode_link);
      if($rim == 5) {
        return '../'.$explode_link[3];
      } else if($rim == 4) {
        return $explode_link[3];
      }
    }

    public static function selfgetPage() {
      $explode_link = explode('/',$_SERVER['REQUEST_URI']);
      $explode_link2 = explode('_',$explode_link[3]);
      return '../../'.'list_'.$explode_link2[1];
    }

    /*
    * Routing untuk mendapatkan Flash Data
    * @$data = string
    * @$msg = string
    * @return $flash
    */
    public static function getFlashData($data,$msg) {
      if($data == 'success') {
        $_SESSION['FLASH'] = array(
          'post_ok' => true,
          'color' => 'success',
          'msg' => $msg
        );
      } else if($data == 'failed') {
        $_SESSION['FLASH'] = array(
          'post_err' => true,
          'color' => 'danger',
          'msg' => $msg
        );
      }
      $flash = $_SESSION['FLASH'];
      unset($_SESSION['FLASH']);
      return $flash;
    }

    /*
    * Routing untuk set Flash Data
    * @$flash = array()
    */
    public static function setFlashData($flash) {

      $_SESSION['FLASH'] = $flash;

    }
    /*
    * Routing untuk mendirect halaman
    * @$url = string (optional)
    * @$status = string (optional)
    * @$messages = string(optional)
    */
    public static function redirect($status = null, $messages = null, $url = null) {

      if(!empty($url)) {
        $url = $url;
      } else {
        $url = self::backToPage();
      }
      if(!empty($status) || !empty($messages)) {
        $set_flash = self::getFlashData($status,$messages);
        self::setFlashData($set_flash);
      }
      header("location:".$url);
      exit();
    }

    public static function Add() {
        return "add-action.php";
    }

}
