<?php
session_start();
include "koneksi.php";
include "header.php";

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
      		<li><a href="adminProduk.php" id="active">Insert Produk</a></li>
     		  <li><a href="pesananMasuk.php">Pesanan Masuk</a></li>
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


<div class="container tambah">
  <div class="row">
    <form method="POST" action="prosesProduk.php" enctype="multipart/form-data">
    <table class="table table-bordered" style="background-color: #be1630;">
      <thead style="color: white">
        <td>Id Produk</td>
        <td>Nama</td>
        <td>harga</td>
        <td>jenis</td>
        <td>gambar</td>
        <td>action</td>  
      </thead>
      <tr>
        <td><input type="text" name="idProduk" style="width:100px;" maxlength="5"></td>
        <td><input type="text" name="namaProduk" style="width: 100%"></td>
        <td><input type="text" name="harga" style="width: 100%"></td>
        <td><select name="jenis">
          <option value=""> </option>
          <option value="satuan">satuan</option>
          <option value="paket">paket</option>
        </select></td>
        <td><input type="file" name="gambar"></td>
        <td>
        <input type="submit" name="tambah" value="tambah" style="color: #be1630;border-radius: 20px;background: #fec232;border-color: white">
        <input type="submit" name="upgrade" value="upgrade" style="color: #be1630;border-radius: 20px;">
        </td>
      </tr>
    </table>
  </div>


  <div class="row">
    <center><h3>Berikut ini produk yang sudah terinput</h3></center>
  </div>

  <!--menampilkan produk-->
<table class="table table-bordered">
  <div class="row">
  
     <thead>
        <td style="width: 150px;">Id Produk</td>
        <td style="width: 300px";>Nama</td>
        <td style="width: 200px";>jenis</td>
        <td style="width: 200px;">harga</td>
        <td style="width: 200px;">gambar</td>
        <td style="width: 200px;">action</td>  
      </thead>
     
      <?php
        $query = "SELECT * FROM tb_produk ORDER BY idProduk";
        $result = mysqli_query($koneksi,$query);

          while( $data = mysqli_fetch_array($result)){
                 echo '<tr><td>'.$data['idProduk'].'</td>';
                 echo '<td>'.$data['namaProduk'].'</td>';
                 echo '<td>'.$data['jenis'].'</td>';
                 echo '<td>'.$data['harga'].'</td>';
                 echo '<td><img src="gambarProduk/'.$data['gambar'].'" style="width:30px;height:30px"></td>';
                  ?>
                  <td>
                  <a href="hapus.php?del=<?php echo $data['idProduk'];?>">
                  <button type="button" class="button btn-danger" name="hapus" value="hapus">hapus</button>
                  </a>
                 </td></tr>
                 <?php
                 }

      ?>
      
    </table>
  </form>
  </div>
</div>
  

<?php
include "footer.php";
?>

</body>
</html>


