<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Page::useLayout('back_layout');

?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <?php if(!empty($_SESSION['POS']['FLASH'])) {
      foreach($_SESSION['POS']['FLASH'] as $key => $val){
        eval('$'.$key.' = $val;');
      }
      if($post_ok) {
        $post_color = $color;
        $post_msg = $msg;
      } else if($post_err) {
        $post_color = $color;
        $post_msg = $msg;
      }
      ?>
      <div class="alert alert-<?php echo $post_color;?> alert-dismissible fade show" role="alert">
        <?php echo $post_msg;?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php  unset($_SESSION['POS']['FLASH']); } ?>

    <div class="row">
      <!-- left column -->
      <div class="col-md-<?php echo $p_col;?>">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $p_title;?></small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <?php echo array_pop($content); ?>

        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>


<?php Page::buildLayout(); ?>
