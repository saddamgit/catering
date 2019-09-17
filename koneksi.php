<?php
	$servename ="localhost";
	$username = "root";
	$password = "";
	$namaDB ="db_cateringku";

	$koneksi = new mysqli($servename,$username,$password);
	$selectDB = mysqli_select_db($koneksi, $namaDB);

/*	if ($koneksi) {
		echo "koneksi berhasil ";
		if ($selectDB) {
			echo "database ditemukan";
		}else{
			echo "database ";
		}

	}else{
		echo "koneksi gagal";
	}
*/	
  ?>