<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Page::useLayout('auth_layout');

?>

  <?php foreach($a_form as $key => $value) {
    if($value['input'] == 'checkbox') {
      ?>
      <div class="col-8">
        <div class="icheck-primary">
          <input type="<?php echo $value['input'];?>" id="<?php echo $value['id'];?>" name="<?php echo $value['name'];?>">
          <label for="<?php echo $value['label'];?>">
            <?php echo $value['label'];?>
          </label>
        </div>
      </div>
    <?php } else {
      ?>
      <div class="input-group mb-3">
        <input type="<?php echo $value['input'];?>" name="<?php echo $value['name'];?>" class="form-control" placeholder="<?php echo $value['placeholder'];?>">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-<?php echo $value['icon'];?>"></span>
          </div>
        </div>
      </div>
  <?php  }
} ?>
<div class="row">

  <!-- /.col -->
  <div class="col-4">
    <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
  </div>
  <!-- /.col -->
</div>
<?php Page::buildLayout(); ?>
