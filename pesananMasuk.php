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

	#active{
	  color : #fec232;
	}

	a{
	  text-decoration: none;
	  color: darkred;
	  font-weight: bold;
	}
	a:hover{
	  text-decoration: none;
	  color: red;
	  font-weight: bold;
	}
	.tambah{
	  margin-top: 20px;
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
      		<li><a href="adminProduk.php">Insert Produk</a></li>
     		  <li><a href="pesananMasuk.php" id="active">Pesanan Masuk</a></li>
         
   		 </ul>

   		 <ul class="nav navbar-nav navbar-right">
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
  </div>
</div>

<?php

	$sql = "SELECT * FROM tb_detail_checkout";
	$result = mysqli_query($koneksi,$sql);
	

	if (mysqli_num_rows($result) > 0) { //
		?>
		<div class="container" style="margin-top: 100px;">
		<div class="table-responsive">
		<form action="upgradeStatus.php" method="POST">
		<table class="table" >
					<tr>
						<th>idKonsumen</th>
						<th>Nama Pemesan</th>
						<th>No Hp</th>
						<th>Tanggal Delivery</th>
						<th>Alamat</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
		<?php 
		while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $row['idKonsumen']; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['nohp']; ?></td>
						<td><?php echo $row['tgl_delivery']; ?></td>
						<td><?php echo $row['alamat_delivery']; ?></td>
						<td>
						<select name="status">
							<option value="waiting payment">waiting payment</option>
							<option value="diproses">diproses</option>
							<option value="dikirim">dikirim</option>
							<option value="delivered">delivered</option>
						</select></td>
						<td><input type="submit" name="upgrade" value="upgrade"></td>
					</tr>
				
				<?php
			}	
	}
	else{

		?>
		</table>
				</form>
				</div>
				</div>
			<center><h3>Tidak ada pesanan wkwkwk</h3></center>
		<?php
	}
	
?>
</body>
</html>
