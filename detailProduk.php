<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<style type="text/css">
	.table{
		 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.3);
	}
</style>

<body>
	<?php
	session_start();
	include"koneksi.php";
	include"header.php";
	$total_harga = $_SESSION['total'];
	
	$sql ="SELECT p.namaProduk,ch.quantity FROM tb_produk p
	join tb_checkout ch on p.idProduk = ch.idProduk join tb_detail_checkout dt
	on dt.idKonsumen=ch.idKonsumen WHERE dt.idKonsumen = '".$_SESSION['idKonsumen']."'";

	$result = mysqli_query($koneksi,$sql);

	if (mysqli_num_rows($result) > 0) { //
		?>
		<div class="container" style="width: 600px">
		<div class="table-responsive">
		<table class="table table-bordered" style="margin-top: 100px;">
					<tr>
						
						<th>nama produk</th>
						<th style="width: 20px;">quantity</th>

					</tr>
		<?php 
		while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						
						<td><?php echo $row['namaProduk']; ?></td>
						<td style="text-align: center;"><?php echo $row['quantity']; ?></td>
					
					</tr>
				
				<?php
			}
			
	}

?>
</table>
</div>	
</div>
<center>
<h2>total yang harus dibayar Rp.<?php echo $_SESSION['total'] ?></h2><br><br>
<pre>Silahkan transfer ke Rekening Kami
No Rek 123456789 an Cateringku
dan konfirmasi ke 0812345678
dengan format kode_pesanan dan nominal transfer
 </pre>
<a href="cekOrder.php"><button style="color: blue;cursor: pointer;" >kembali</button>  </a>
</center>
</body>
</html>
