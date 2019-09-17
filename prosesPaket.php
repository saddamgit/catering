<?php
session_start();
include "koneksi.php";
   $namaPaket = $_POST['namaPaket'];
    $harga = $_POST['harga'];
    //$gambar = $_POST['gambar'];
   $file = $_FILES["gambar"]["name"]; //mendapatkan nama paket
     $lokasi = $_FILES["gambar"]["tmp_name"]; 
     //menyiapkan tempat menampung gambar yang diupload
     $lokasiTujuan = "./gambarPaket";
     //mengupload ke dalam folder ./gambarpaket
     $upload=move_uploaded_file($lokasi,$lokasiTujuan."/".$file);

if(isset($_POST["tambah"]))  
 {  
    $sqlcek = "SELECT namaPaket FROM tb_paket WHERE namaPaket = '".$namaPaket."'";
    $resultcek = mysqli_query($koneksi,$sqlcek);
    $datacek = mysqli_num_rows($resultcek);
    if ($datacek > 0) {
          ?><script>alert('Paket gagal ditambahkan, karena sudah tersedia !');
          window.open("adminPaket.php","_SELF");
        </script><?php
    }
    else{

      $sql = "INSERT INTO tb_paket (namaPaket,harga,gambar) VALUES ('".$namaPaket."','".$harga."','".$file."')"; 
      $result = mysqli_query($koneksi, $sql); 

        if($result)  
        {  
              ?><script>alert('Paket berhasil ditambahkan !');
              window.open("adminPaket.php","_SELF");
              </script><?php
        } else{
              ?><script>alert('Paket gagal ditambahkan !');
              window.open("adminPaket.php","_SELF");
             </script><?php
         }
 	

    } 
}



if (isset($_POST['upgrade'])) {

   $sql = "UPDATE tb_paket SET namaPaket = '".$namaPaket."',harga = '".$harga."',gambar = '".$file."' WHERE namaPaket = '".$namaPaket."'";

   $result = mysqli_query($koneksi,$sql);
   if ($result) {
      echo '<script>alert("Paket berhasil diupgrade")</script>'; 
           header('location:adminPaket.php');
   }else{
        echo '<script>alert("Paket gagal diupgrade ")</script>';
        header('location:adminPaket.php');
    
}
}
 

?>