<?php
	session_start();
	include "koneksi.php";
	$tglCheckout = date('Y-m-d');


	// $sqlCek = "SELECT k.idKonsumen,k.username,ch.idKonsumen FROM tb_checkout ch JOIN tb_konsumen k 
	// 			ON k.idKonsumen = ch.idKonsumen
	// 			WHERE k.username = '".$_SESSION['username']."'";
	// $resultCek = mysqli_query($koneksi,$sqlCek);
	// $dataCek = mysqli_num_rows($resultCek);

	// if ($dataCek > 0) {
	// 	?>
 //        <script>
 //        alert("sudah di checkout");
 //        window.open("produk.php","_SELF");
 //        </script>
 //        <?php	
	// }
	// else{
			$query = "INSERT INTO tb_checkout (idKonsumen,idProduk,harga,quantity,tanggal)
			SELECT c.idKonsumen,c.idProduk,c.harga,c.quantity,'".$tglCheckout."' FROM tb_cart c 
			JOIN tb_konsumen k ON k.idKonsumen=c.idKonsumen
			WHERE k.username = '".$_SESSION['username']."'";
			$result = mysqli_query($koneksi,$query);

			if ($result) {
				?>
		        <script>
		        alert("checkout berhasil");
		        window.open("checkout.php","_SELF");
		        </script>
		        <?php			
			}else{
				?>
		        <script>
		        alert("checkout gagal");
		        window.open("cart.php","_SELF");
		        </script>
		        <?php
			}
	//}

?>