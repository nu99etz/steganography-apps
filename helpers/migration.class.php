<?php

class Migration {

  public static function up() {
    return array();
  }

  public static function down() {
    return array();
  }

  public static function run($conn,$sql) {
    $conn->Execute($sql);
    echo ' -- '.$sql.PHP_EOL;
  }
  
}

 ?>
