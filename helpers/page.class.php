<?php

class Page {

    public static function usePage($name = null) {

      if($name == null) {
        $path = 'pages/form.php';
      } else {
        $path = 'pages/'.$name.'.php';
      }
      return $path;
    }

    public static function useLayout($name) {
      return $name.'.php';
    }

    public static function getLayout($name) {

      return '../assets/layout/'.$name.'.php';

    }

    public static function getErrorCode($code) {

      return '../assets/layout/'.$code.'.php';

    }

    public static function usePartial($name) {

      return 'partial/'.$name.'.php';

    }

    public static function pageInsert($record,$model) {

      $add = $model::recInsert($model::fillable,$record);
      if($add) {
        Route::redirect('success','Data Berhasil Ditambah');
      } else {
        Route::redirect('failed','Data Gagal Ditambah',Route::selfPage());
      }

    }

    public static function pageUpdate($record,$model,$id) {

      $update = $model::recUpdate($model::fillable,$record,$id);
      if($update) {
        Route::redirect('success','Data Berhasil Diubah',Route::selfgetPage());
      } else {
        Route::redirect('failed','Data Gagal Diubah',Route::selfPage());
      }
    }

    public static function pageDelete($model,$id) {

      $delete = $model::recDelete($id);
      if($delete) {
        Route::redirect('success','Data Berhasil Dihapus',Route::selfPage());
      } else {
        Route::redirect('failed','Data Gagal Dihapus',Route::selfPage());
      }
    }
}

 ?>
