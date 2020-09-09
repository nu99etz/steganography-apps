<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

// Properti Halaman
$p_title = 'POS - Master - Barang';
$p_col = 12;
$p_namepage = 'Master Barang';
$permit["can.$custom_name"];

require_once(Route::getModelPath('Barang'));

$a_data = BarangModel::getAll();

// Ambil Layout
Page::useLayout('table');

?>

<table id="barang" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Stok Barang</th>
      <th>Manufaktur Barang</th>
      <th>Harga Per Satuan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;foreach($a_data as $key => $value) {
      ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $value['kode_barang'];?></td>
        <td><?php echo $value['nama_barang'];?></td>
        <td><?php echo $value['jumlah_stok_barang'];?></td>
        <td><?php echo $value['manufaktur_barang'];?></td>
        <td><?php echo $value['harga_per_satuan_barang'];?></td>
        <td></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<script>
  $(function () {
    $("#barang").DataTable();
  });
</script>


<?php
// Bangun Layout
Page::buildLayout();
?>
