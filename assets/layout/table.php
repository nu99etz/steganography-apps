<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

require_once(Page::usePartial('head'));
require_once(Page::usePartial('sidebar'));
require_once(Page::usePartial('breadcumb'));
include('../common/action.php');


?>

<!-- Main content -->
<section class="content">
  <?php if(!empty($_SESSION['FLASH'])) {
    foreach($_SESSION['FLASH'] as $key => $val){
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
<?php  unset($_SESSION['FLASH']); } ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $p_namepage;?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php if($c_add) {
            ?>
            <a href = '<?php echo Route::Tambah();?>' class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Tambah</i></a>
            <br/>
            <br/>
        <?php  } ?>
          <table id="<?php echo $p_tableid;?>" class="table table-bordered table-striped">
            <thead>
            <tr>
              <?php foreach($a_coloumn as $key => $value) {
                      foreach($value as $value2) {
                        ?>
                        <th><?php echo $value2;?></th>
                <?php } } ?>
                <?php if($c_delete || $c_update || $c_read) {
                  ?>
                  <th>Aksi Tambahan</th>
            <?php  } ?>
            </tr>
            </thead>
            <tbody>
                <?php $no=0; foreach($a_data as $key) {
                  ?>
                  <tr>
                    <td><?php echo $no+1;?></td>
                    <?php for($j=1;$j<count($key)/2;$j++) {
                      ?>
                      <td><?php echo $a_data[$no][$j];?>
                  <?php  }
                  ?>
                  <?php if($c_delete) {
                    $actd = '<button type = "submit" name = "'.$permit['actdelete'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    ?>
                <?php  } if($c_update) {
                    $actu = '<a href = '.Route::Edit($destination,$a_data[$no][0]).' class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>';
                  ?>
              <?php  } if($c_read) {
                $actr = '<a href = '.Route::View($destination,$a_data[$no][0]).' class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
              } ?>
              <?php if($c_delete || $c_update || $c_read) {
                ?>
              <form id = "<?php echo $a_data[$no][0];?>" method="post" action="">
                <input type = "hidden" name = "id" value = "<?php echo $a_data[$no][0];?>">
                <input type = "hidden" name = "<?php echo $permit['actdelete'];?>" value = "<?php echo $permit['actdelete'];?>">
                <td><?php echo $actr.' '.$actu.' '.$actd;?></td>
              </form>
            <?php  } ?>
                  </tr>
              <?php $no++; } ?>
            </tbody>
            <tfoot>
              <tr>
                <?php foreach($a_coloumn as $key => $value) {
                        foreach($value as $value2) {
                          ?>
                          <th><?php echo $value2;?></th>
                  <?php } } ?>
                  <?php if($c_delete || $c_update) {
                    ?>
                    <th>Aksi Tambahan</th>
              <?php  }  ?>
              </tr>
            </tfoot>
          </table>
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
</div>

<?php

require_once(Page::usePartial('footer'));
require_once(Page::usePartial('script'));

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
</body>
</html>
