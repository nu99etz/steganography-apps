<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Page::useLayout('back_layout');

?>

<!-- Main content -->
<section class="content">
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
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $p_namepage;?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php echo array_pop($content);?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<?php
Page::buildLayout();
?>

<script>
  $(function () {
    $("#<?php echo $p_tableid;?>").DataTable();
    /*$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });*/
    $('#<?php echo $id;?>').validate({
      submitHandler: function(){
        bootbox.confirm({
        message : "Apakah Anda Yakin Menghapus Data Ini ??",
        buttons : {
          confirm : {
            label : 'Hapus',
            className : 'btn-primary'
          },
          cancel : {
            label : 'Batal',
            className : 'btn-danger'
          }
        },
        callback : function(result) {
            if(result) {
              $('#deleteconfirm')[0].submit();
            }
          }
        })
      }
    });
  });
</script>
