<?php

/**
 * Kumpulan Fungsi Form
 *
 * @author nugraha
*/

class Form {

    public static function input($form,$type,$class,$name,$placeholder,$value = null){
        return "<div class='$form'>
        <input type='$type' class='$class' name='$name' placeholder='$placeholder' value ='$value'>
        </div>";
    }

    public static function button($type,$class,$name,$value) {
        return "<input type='$type' class='$class' name='$name' value='$value'>";
    }

}