<?php

class Check {

    public static function debug($key) {
        if(is_array($key)){
            echo "<pre>";
            print_r($key);
            echo"</pre>";
        } else {
            var_dump($key);
        }
        die();
    }

    public static function json($json) {
      echo json_encode($json);
      die();
    }
}
