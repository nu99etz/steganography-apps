<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

// Cek Error
if($p_error == '404') {
  $code = '404';
  $message = ' Halaman tidak ditemukan';
} else if($p_error == '401') {
  $code = '401';
  $message = ' Unauthorized';
} else if($p_error == '403') {
  $code = '403';
  $message = ' Forbidden';
} else if($p_error == '419') {
  $code = '419';
  $message = ' Halaman Expire';
} else if($p_error == '429') {
  $code = '429';
  $message = ' Terlalu Banyak Request';
} else if($p_error == '500') {
  $code = '500';
  $message = ' Server Error';
} else if($p_error == '503') {
  $code = '503';
  $message = ' Service Unavailable';
}

Page::useLayout('error_handler');

?>

<div class="code">
    <?php echo $code;?>
</div>

<div class="message" style="padding: 10px;">
  <?php echo $message;?>
</div>

<?php Page::buildLayout(); ?>
