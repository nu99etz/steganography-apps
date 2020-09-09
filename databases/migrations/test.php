<?php

// Ngetest Migrasi

$sql = "CREATE TABLE testing";
$sql .= " (";
$sql .= " id serial primary key,";
$sql .= " nama varchar(255),";
$sql .= " alamat varchar(255),";
$sql .= " is_aktif int";
$sql .= " )";

$test = $conn->Execute($sql);

if(!$test) {
  // echo "Failed To Migration";
} else {
  // $conn->debug = true;
  // if($conn->debug) {
  //   Check::debug($conn->debug);
  // }
}


?>
