<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Page::useLayout('html');

?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><?php echo $p_namepage;?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">

    <div class="card-body login-card-body">

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

      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <?php echo array_pop($content); ?>
      </form>

        <?php if($auth_social) {
          include('partial/auth_social_forms');
        } ?>

        <?php if($auth_forgot) {
          include('partial/auth_forgot');
        } ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php Page::buildLayout(); ?>
