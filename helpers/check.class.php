<?php

class Check {

    public static function debug_array($key) {
        if(is_array($key)){
            echo "<pre>";
            print_r($key);
            echo"</pre>";
        } else {
            echo $key;
        }
        die();
    }


    public static function debug_dump($key) {
        return var_dump($key);
    }
}
