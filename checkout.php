
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
	fieldset{
		width: 400px;
		margin-top: 10px;
		background-color: transparent;
		
		background-color: lightgrey;
	}
	input{
		
		width: 175px;
		border-radius: 5px;
	}

	textarea{
		border-radius: 5px;
		width: 175px;
	}
</style>


<body>
<center>

<?php
	include"header.php";
	session_start();

?>
<hr>
<div class="container">
		<div class="row">
			<h3><?php echo "Hello ".$_SESSION['username'].", ini total tagihan Anda Rp. ".$_SESSION['total']." !!! "; ?><h3>
		</div>
	
<div class="formPemesanan">
<center>
<label><h3>Silahkan Isi Form Pemesanan</h3></label>
<fieldset>
<form action="prosesPemesanan.php" method="POST">
	<table style="margin: 10px;">
		<tr>
			<td>Nama </td>
			<td></td>
			<td><input type="text" name="nama" placeholder="nama pemesan"></td>
		</tr>
		<tr>
			<td>Alamat </td>
			<td></td>
			<td><textarea name="alamat" placeholder="alamat penerima"></textarea></td>
		</tr>
		<tr>
			<td>No. Telp/HP</td>
			<td></td>
			<td><input type="text" name="noHP" placeholder=" nomer hp"></td>
		</tr>
		<tr>
			<td>Tanggal Delivery</td>
			<td></td>
			<td><input type="datetime-local" name="tgl"></td>
		</tr>
		
	</table>
	<input type="submit" name="submit" value="selesai" class="button btn-primary btn-lg"><br><br>

</form>
</fieldset><br><br>
<a href="cart.php"><button style="color: blue;cursor: pointer;" >kembali</button>  </a>
</center>
</div>

<br><br>					
				
			<?php
		?>
</div>


<?php
	include"footer.php";
?>
</center>
</body>
</html>