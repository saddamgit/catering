<?php
   
  include "koneksi.php";

    $sqlCek = "SELECT tanggal FROM tb_cart";
    $queryCek = mysqli_query($koneksi,$sqlCek);
      


            $durasi=2;

            $sql ="DELETE FROM tb_cart WHERE DATEDIFF(now(), tanggal) > $durasi";
           // $sql ="DELETE FROM tb_cart WHERE tanggal > $durasi";
            $query = mysqli_query($koneksi,$sql);
           // $query = $koneksi->query($sql);


?>
