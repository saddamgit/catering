<?php
	session_start();
	include"koneksi.php";
	$status = $_POST['status'];
	$sql =  "UPDATE tb_detail_checkout SET status ='".$status."'";
	$result = mysqli_query($koneksi,$sql);
	if ($result) {
		?>
		        <script>
		        alert("berhasil diupgrade");
		        window.open("pesananMasuk.php","_SELF");
		        </script>
		        <?php
	}
	else{
			?>
		        <script>
		        alert("gagal diupgarade");
		        window.open("pesananMasuk.php","_SELF");
		        </script>
		        <?php
	}
?>