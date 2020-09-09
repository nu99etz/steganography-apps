<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

// $custom_name = "Simpan";
// $custom_message = "Apakah Anda Yakin Mau Menyimpan Data Ini ??";
// $permit = Permission::getPageCustomPermission($custom_name);

// Properti Halaman
$p_title = 'CRUD Testing';
$p_col = 12;
$p_namepage = 'CRUD';
$permit["can.$custom_name"];

// $act = Permission::getPagePermission();
//
// $c_read = $act['canread'];
// $c_add = $act['canadd'];
// $c_delete = $act['candelete'];
// $c_update = $act['canupdate'];

require_once(Route::getModelPath('testing'));

$a_data = TestingModel::getAll();

// Table
$a_coloumn[] = array('No','Nama','Alamat');

// Ambil Layout
Page::useLayout('table');

?>

<table id="test" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;foreach($a_data as $key => $value) {
      ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['alamat'];?></td>
        <td></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<script>
  $(function () {
    $("#test").DataTable();
  });
</script>


<?php
// Bangun Layout
Page::buildLayout();
?>
