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


<body>
<?php
	include"header.php";
	include"autoHapusCart.php";
	session_start();


?>
<hr>
<div class="container">
		<div class="row">
			<h3><?php echo "Hello ".$_SESSION['username'].", this is your shopping cart!!! "; ?><h3>
		</div>

		<?php
		
		include"koneksi.php";
			$query = "SELECT k.username, p.namaProduk, p.jenis, p.idProduk, c.quantity, c.idProduk, c.idCart, c.harga,c.tanggal
				FROM tb_konsumen k JOIN tb_cart c
				ON k.idkonsumen = c.idKonsumen 
				JOIN tb_produk p
				ON c.idProduk = p.idProduk
                WHERE k.username = '".$_SESSION['username']."'";

			//$query = "SELECT * FROM tb_cart WHERE username = '".$_SESSION['username']."'";
			$result = mysqli_query($koneksi,$query);
			?>
			
			<table class="table table-bordered">
				<tr>
					<th>Nama Produk</th>
					<th>Jenis</th>
					<th>Harga</th>
					<th style="width: 50px">quantity</th>
					<th style="width: 100px">jml harga</th>
					<th style="width: 200px">action</th>
				</tr>
			
			<?php

			if (mysqli_num_rows($result) > 0) {
				$total = 0;
				while ($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					
					<td><?php echo $row['namaProduk'];?></td>
					<td><?php echo $row['jenis'];?></td>
					<td><?php echo $row['harga']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo number_format($row["harga"] * $row["quantity"], 0); ?></td>
					<td>
					 <a href="hapusCart.php?del=<?php echo $row['idCart'];?>">
					 	<button type="button" class="button btn-danger btn-sm" value="hapus">hapus</button>
					 </a>
					 </td>

				</tr>
				<?php
				
				$total = $total + ($row['harga'] * $row['quantity']);
				$_SESSION['total']=$total;
				}
				?>
				<tr>
					<td colspan="4">total</td>
					<td><?php echo number_format($total); ?></td>
				</tr>
				<?php
			}
			?>

			
			</table>
			
		
				<a href="produk.php">
						<button type="button" class="button btn-success btn-lg" value="tambah produk">tambah produk</button>
				</a>
				<a href="prosesCheckout.php">
						<button type="button" class="button btn-primary btn-lg" value="Checkout">Checkout</button>
				</a>

			<?php
		?>
</div>

<?php
	include"footer.php";
?>

</body>
</html>