<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

Page::useLayout('table');

?>

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
<?php Page::buildLayout(); ?>
