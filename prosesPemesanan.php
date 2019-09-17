<?php
include 'koneksi.php';
session_start();
	
			$idKonsumen = $_SESSION['idKonsumen'];
			$nama = $_POST['nama'];
			$noHP = $_POST['noHP'];
			$tgl = $_POST['tgl'];
			$alamat = $_POST['alamat'];

		
			$sql = "INSERT INTO tb_detail_checkout (idCheckout,idKonsumen,nama,nohp,tgl_delivery,alamat_delivery)
			VALUES ('".$idCheckout."','".$idKonsumen."','".$nama."','".$noHP."','".$tgl."','".$alamat."')";
			$result = mysqli_query($koneksi,$sql);


			if ($result) {
				?>
		        <script>
		        alert("pesanan sukses, silahkan lakukan pembayaran");
		        window.open("produk.php","_SELF");
		        </script>
		        <?php	
			}else{
				?>
		        <script>
		        alert("gagal melakukan pesanan");
		        window.open("checkout.php","_SELF");
		        </script>
		        <?php	
			}




?>