
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
<?php
		session_start();
		include"koneksi.php";
		include"header.php";
?>

<style type="text/css">
	.header{
	background-color: white;
	}
	#active{
  color : #fec232;
	}
  .navmenu{
    background: #be1630;
    margin-bottom: 0px;
  }
   .menu ul li a{
    color : white;
  }
   .menu ul li a:hover{
    color : #fec232;
    background: #be1630;

  }
  .signup{
    background-color: #fec232;
    font-weight: bold;
    color: #fff;
    text-align: center;
  }
  .gambar img{
    width: 100%;
  }
  .register{
    color: white;
  }
   .register:hover{
    color: #fec232;
  }
  .table{
  	 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.3);
  }


	/* Style The Dropdown Button */
	.dropbtn {
 	 background-color: #be1630;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
	}

	/* The container <div> - needed to position the dropdown content */
	.dropdown {
    position: relative;
    display: inline-block;
	}

	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
    display: none;
    position: absolute;
    background-color: #be1630;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	}

	/* Links inside the dropdown */
	.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
	}

	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {color : #fec232;}

	/* Show the dropdown menu on hover */
	.dropdown:hover .dropdown-content {
	    display: block;
	}

	/* Change the background color of the dropdown button when the dropdown content is shown */
	.dropdown:hover .dropbtn {
	    color : #fec232;
	}

</style>
<body>
<div class="navmenu">
  <div class="container-fluid ">
    <div class="menu">

   		 <ul class="nav navbar-nav">
      		<li class="active"><a href="produk.php">Produk</a></li>
     		  <li><a href="paket.php">Paket</a></li>
          <li><a href="cekOrder.php" id="active">Cek order</a></li>
   		 </ul>

   		 <ul class="nav navbar-nav navbar-right">
	          <li>
	              <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>cart</a>
	          </li>

	           <li>
	             <div class="dropdown">
	                  <button class="dropbtn">
	                    <span class="glyphicon glyphicon-user"></span>
	                     <?php echo " ".$_SESSION['username']; ?>
	                   </button>
	                    <div class="dropdown-content">
	                      <a href="index.php" name="Logout">Logout</a>
	                    </div>
	              </div>
	           </li>
    	</ul>
    </div>

        <form class="navbar-form navbar-right">
    		<div class="input-group">
    			<input type="text" class="form-control" placeholder="Search" name="search">
    			<div class="input-group-btn">
    				<button class="btn btn-default" type="submit">
    				<i class="glyphicon glyphicon-search"></i>
    				</button>
    			</div> 
    		</div>
    	</form>
  </div>
</div>

<?php
	
	// $sql ="SELECT p.namaProduk,dt.idDetail,dt.nama,dt.nohp,dt.tgl_delivery,dt.alamat_delivery,dt.status FROM tb_produk p
	// join tb_checkout ch on p.idProduk = ch.idProduk join tb_detail_checkout dt
	// on dt.idKonsumen=ch.idKonsumen WHERE dt.idKonsumen = '".$_SESSION['idKonsumen']."'";

	$sql = "SELECT * FROM tb_detail_checkout
	WHERE idKonsumen = '".$_SESSION['idKonsumen']."'";
	$result = mysqli_query($koneksi,$sql);

	if (mysqli_num_rows($result) > 0) { //
		?>
		<div class="container">
		<div class="table-responsive">
		<table class="table table-bordered" style="margin-top: 100px;text-align: center;">
					<tr style="background: #be1630;color: white">
						<td>Kode Pesanan</td>
						<td>Detail Produk</td>
						<td>Nama Pemesan</td>
						<td>No Hp</td>
						<td>Tanggal Delivery</td>
						<td>Alamat</td>
						<td>Status</td>
					</tr>
		<?php 
		while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $row['idDetail']; ?></td>
						<td><a href="detailProduk.php">Detail Produk</a></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['nohp']; ?></td>
						<td><?php echo $row['tgl_delivery']; ?></td>
						<td><?php echo $row['alamat_delivery']; ?></td>
						<td><div class="alert alert-info " style="text-align: center;">
						  <strong><?php echo $row['status']; ?></strong>
						</div>
						</td>
					</tr>
				
				<?php
			}	
	}
	else{
		?>
			<center><h3>anda tidak memiliki orderan</h3></center>
		<?php
	}
	
?>
				</table>
				</div>	
				</div>

</body>
</html>




