<?php


include('../config/autoload.php');

class Steganography extends Converter {

  public function getEncrypt($files,$messages) {

    $messages .= '|';
    $msgBin = static::toBin($messages);
    $msgLength = strlen($msgBin);

    //if($files[''])

    // echo "<pre>";
    // print_r($files);
    // echo "</pre>";
    // die();

    if($files['type'] == "image/jpeg") {
      $img = imagecreatefromjpeg('../upload/'.$files['file_name']);
    } else if($files['type'] == "image/png") {
      $img = imagecreatefrompng('../upload/'.$files['file_name']);
    }

    list($width,$height,$type,$attr) = getimagesize('../upload/'.$files['file_name']);

    if($msgLength>($width*$height)){
      echo('Pesan Terlalu Panjang Gan');
      die();
    }

    $pixelX=0;
    $pixelY=0;

    for($x=0;$x<$msgLength;$x++){

      if($pixelX === $width+1){
        $pixelY++;
        $pixelX=0;
      }

      if($pixelY===$height && $pixelX===$width){
        echo('Max Reached');
        die();
      }

      $rgb = imagecolorat($img,$pixelX,$pixelY);
      $r = ($rgb >>16) & 0xFF;
      $g = ($rgb >>8) & 0xFF;
      $b = $rgb & 0xFF;

      $newR = $r;
      $newG = $g;
      $newB = static::toBin($b);
      $newB[strlen($newB)-1] = $msgBin[$x];
      $newB = static::toString($newB);

      $new_color = imagecolorallocate($img,$newR,$newG,$newB);
      imagesetpixel($img,$pixelX,$pixelY,$new_color);
      $pixelX++;

    }

    $rand = rand(1,9999);
    if($files['type'] == "image/jpeg") {
      $eks = '.jpg';
      imagepng($img, '../upload/enkripsi/encrypt'.$rand. '.jpg');
    } else if($files['type'] == "image/png") {
      $eks = '.png';
      imagepng($img, '../upload/enkripsi/encrypt'.$rand. '.png');
    }

    imagedestroy($img);

    Route::redirect('success','Gambar Berhasil Dienkripsi Hasil Gambar : hasil'.$rand.$eks,Route::selfPage());

  }

  public function getDecrypt($files) {

    // if($files['type'] == 'image/png') {
    //     $img = imagecreatefrompng("../upload/enkripsi/".$files['name']);
    // } else if($files['type'] == 'image/jpeg') {
    //   $img = imagecreatefromjpeg("../upload/enkripsi/".$files['name']);
    // }

    $img = imagecreatefrompng("../upload/enkripsi/".$files['name']);

    $real_message = '';

    $count = 0;
    $pixelX = 0;
    $pixelY = 0;

    list($width, $height, $type, $attr) = getimagesize("../upload/enkripsi/".$files['name']);

    for ($x = 0; $x < ($width*$height); $x++) {
      if($pixelX === $width+1){
        $pixelY++;
        $pixelX=0;
      }

      if($pixelY===$height && $pixelX===$width){
        echo('Max Reached');
        die();
      }

      $rgb = imagecolorat($img,$pixelX,$pixelY);
      $r = ($rgb >>16) & 0xFF;
      $g = ($rgb >>8) & 0xFF;
      $b = $rgb & 0xFF;

      $blue = static::toBin($b);

      $real_message .= $blue[strlen($blue) - 1]; //Ad the lsb to our binary result

      $count++; //Coun that a digit was added

      if ($count == 8) { //Every time we hit 8 new digits, check the value
          if (static::toString(substr($real_message, -8)) === '|') { //Whats the value of the last 8 digits?
              $real_message = static::toString(substr($real_message,0,-8)); //convert to string and remove /
              Route::redirect('success','Hasil Dekripsi Gambar : '.$real_message,Route::selfPage());
          }
          $count = 0; //Reset counter
      }

      $pixelX++; //Change x coordinates to next
  }
}
}



 ?>
