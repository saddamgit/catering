<?php
   
  include "koneksi.php";
    $id = $_GET['del'];
    $sql ="DELETE FROM tb_produk WHERE idProduk = '".$id."'";
    $query = mysqli_query($koneksi,$sql);
   // $query = $koneksi->query($sql);

        if($query){
        			?>
        				<script>
        				alert("Produk berhasil dihapus");
        				window.open("adminProduk.php","_SELF");
        				</script>
        			<?php

        }else{
               ?>
        				<script>
        				alert("Produk berhasil dihapus");
        				window.open("adminProduk.php","_SELF");
        				</script>
        			<?php
        }
?>
