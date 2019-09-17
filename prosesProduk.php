<?php
session_start();
include "koneksi.php";
   $idProduk = $_POST['idProduk'];
   $namaProduk = $_POST['namaProduk'];
   $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    //$gambar = $_POST['gambar'];
   $file = $_FILES["gambar"]["name"]; //mendapatkan nama produk
     $lokasi = $_FILES["gambar"]["tmp_name"]; 
     //menyiapkan tempat menampung gambar yang diupload
     $lokasiTujuan = "./gambarProduk";
     //mengupload ke dalam folder ./gambarproduk
     $upload=move_uploaded_file($lokasi,$lokasiTujuan."/".$file);

if(isset($_POST["tambah"]))  
 {  
    $sqlcek = "SELECT namaProduk FROM tb_produk WHERE namaProduk = '".$namaProduk."'";
    $resultcek = mysqli_query($koneksi,$sqlcek);
    $datacek = mysqli_num_rows($resultcek);
    if ($datacek > 0) {
          ?><script>alert('Produk gagal ditambahkan, karena sudah tersedia !');
          window.open("adminProduk.php","_SELF");
        </script><?php
    }
    else{

      $sql = "INSERT INTO tb_produk (idProduk,namaProduk,jenis,harga,gambar) VALUES ('".$idProduk."','".$namaProduk."','".$jenis."','".$harga."','".$file."')"; 
      $result = mysqli_query($koneksi, $sql); 

        if($result)  
        {  
              ?><script>alert('Produk berhasil ditambahkan !');
              window.open("adminProduk.php","_SELF");
              </script><?php
        } else{
              ?><script>alert('Produk gagal ditambahkan !');
              window.open("adminProduk.php","_SELF");
             </script><?php
         }
 	

    } 
}



if (isset($_POST['upgrade'])) {

   $sql = "UPDATE tb_produk SET namaProduk = '".$namaProduk."',jenis = '".$jenis."',harga = '".$harga."',gambar = '".$file."' WHERE idProduk = '".$idProduk."'";

   $result = mysqli_query($koneksi,$sql);
   if ($result) {
      ?>
            <script>
            alert("produk berhasil di upgrade");
            window.open("adminProduk.php","_SELF");
            </script>
            <?php   
   }else{
        ?>
            <script>
            alert("produk gagal di upgrade");
            window.open("adminProduk.php","_SELF");
            </script>
            <?php   
    
}
}
 

?>