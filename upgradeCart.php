<?php
   session_start();

  include "koneksi.php";
    $id = $_GET['upgrade'];
    $data = $_GET['qty'];
    
    $_SESSION['qty'] = $_POST[$data];

    $sql ="UPDATE tb_cart SET quantity = '".$_SESSION['qty']."' WHERE idProduk = '$id'";
    $query = mysqli_query($koneksi,$sql);
   // $query = $koneksi->query($sql);

        if($query){
        			?>
        				<script>
        				alert("Produk berhasil diupgrade");
        				window.open("cart.php","_SELF");
        				</script>
        			<?php

        }else{
               ?>
        				<script>
        				alert("Produk gagal diupgrade");
        				window.open("cart.php","_SELF");
        				</script>
        			<?php
        }
?>
