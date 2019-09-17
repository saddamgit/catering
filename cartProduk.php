<?php
session_start();
include "koneksi.php";

$idKonsumen = $_SESSION['idKonsumen']; //idKonsumen diambil dari idKonsumen yang login
$idProduk = $_POST['hidden_idProduk']; //idProduk diambil dari idProduk yang dipilih konsumen
$harga = $_POST['hidden_harga'];		//harga diambil dari harga produk yang dipilih
$username = $_SESSION['username'];
$qty = $_POST['quantity'];
$tglSkrg = date('Y-m-d');

$sqlCek="SELECT c.idProduk,c.tanggal, p.idProduk, p.namaProduk FROM tb_cart c
        JOIN tb_produk p ON c.idProduk = p.idProduk
        WHERE c.idProduk = '".$idProduk."'AND c.idKonsumen = '".$idKonsumen."'";

$resultCek=mysqli_query($koneksi,$sqlCek);
$dataCek = mysqli_num_rows($resultCek);

if ($dataCek > 0) {
        ?><script>
        alert("Produk sudah tersedia di cart !");
        window.open("produk.php","_SELF");
        </script><?php
}else{
        $sql = "INSERT INTO tb_cart (idKonsumen,idProduk,harga,quantity,tanggal) 
        VALUES ('".$idKonsumen."','".$idProduk."','".$harga."','".$qty."','".$tglSkrg."')";

         $result = mysqli_query($koneksi, $sql); 
        if (isset($_POST['add_to_cart'])) {

              if($result)  
              {  
                ?><script>
                alert("berhasil ditambah ke cart !!! cek cart");
                window.open("produk.php","_SELF");
                </script><?php
              } else{
                ?><script>
                alert("gagal ditambah ke cart !!! cek cart");
                window.open("produk.php","_SELF");
                </script><?php
               }
             }

}

?>