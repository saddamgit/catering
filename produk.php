<?php
session_start();
include "koneksi.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>CateringKu</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />


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
  .builder img{
    margin-top: 20px;
    margin-right: 5px;
    width: 30px;
    height: 30px;
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
<?php 
include"header.php";
?>


<div class="navmenu">
  <div class="container-fluid ">
    <div class="menu">

   		 <ul class="nav navbar-nav">
      		<li class="active"><a href="produk.php" id="active">Produk</a></li>
     		  <li><a href="paket.php">Paket</a></li>
          <li><a href="cekOrder.php">Cek order</a></li>
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
        <form class="navbar-form navbar-right" method="POST" action="search.php">
    		<div class="input-group">
    			<input type="text" class="form-control" placeholder="Search" name="search">
    			<div class="input-group-btn">
    				<button class="btn btn-default" type="submit" name="search">
    				<i class="glyphicon glyphicon-search"></i>
    				</button>
    			</div> 
    		</div>
    	</form>
  </div>
</div>

<!--batas nav -->
	
	 <div class="container" style="width:700px;">  
                <h2 align="center" style="color: white;background: #be1630;padding: 10px;border-radius: 20px;">Pilih Pesanan Anda !!!</h2><br/>  
                <?php  
                $query = "SELECT * FROM tb_produk WHERE jenis = 'satuan' ORDER BY idProduk ASC";  
                $result = mysqli_query($koneksi, $query);  
                if(mysqli_num_rows($result) > 0) //jika produk ada 
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>

                <div class="col-md-4" style="margin-bottom: 50px">  
                     <form method="post" action="cartProduk.php">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="gambarProduk/<?php echo $row["gambar"]; ?>" class="img-responsive"/><br />  
                               <h4 class="text-info"><?php echo $row["namaProduk"]; ?></h4>  
                               <h4 class="text-danger">Rp. <?php echo $row["harga"]; ?></h4>  
                               <input type="number" name="quantity" class="form-control" min="1" value="1" style="width: 100px">
                               <input type="hidden" name="hidden_idProduk" value="<?php echo $row["idProduk"]; ?>" /> 
                               <input type="hidden" name="hidden_name" value="<?php echo $row["namaProduk"]; ?>" />  
                               <input type="hidden" name="hidden_harga" value="<?php echo $row["harga"]; ?>" />
                               <input type="hidden" name="tglSkrg" value="<?php echo $tglSkrg; ?>">
                               <input type="submit" name="add_to_cart" style="margin-top:5px;background:#be1630;border: 0px" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?> 
	</div>

	<?php
	include"footer.php";
	?>	


</body>
</html>


