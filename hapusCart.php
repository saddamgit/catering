<?php
   
  include "koneksi.php";
    $id = $_GET['del'];
    $sql ="DELETE FROM tb_cart WHERE idCart = '$id'";
    $query = mysqli_query($koneksi,$sql);
   // $query = $koneksi->query($sql);

        if($query){
        			?>
        				<script>
        				alert("Produk berhasil dihapus");
        				window.open("cart.php","_SELF");
        				</script>
        			<?php

        }else{
               ?>
        				<script>
        				alert("Produk berhasil dihapus");
        				window.open("cart.php","_SELF");
        				</script>
        			<?php
        }
?>
