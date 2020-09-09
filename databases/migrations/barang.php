CREATE TABLE master.barang (

	id serial primary key,
	kode_barang char(20),
	nama_barang varchar(255),
	jumlah_stok_barang int,
	manufaktur_barang varchar(255),
	harga_per_satuan_barang int,
	add_act timestamp,
	upd_act timestamp,
	delete_act timestamp,
	is_delete int,
	is_aktif int,
	is_update int,

);
