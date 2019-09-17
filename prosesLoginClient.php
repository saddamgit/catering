<?php 
	session_start();
	$_SESSION['username'] = $_POST['userName'];
	$_SESSION['password'] = $_POST['password'];

	include "koneksi.php";
	$sql = "SELECT idKonsumen,username,password FROM tb_konsumen where username = '".$_SESSION['username']."'";

	//
	$result = mysqli_query($koneksi,$sql);
	$num_rows = mysqli_fetch_assoc($result);

	if ($num_rows == 0) {//jika user tidak ada


		?><script>alert("anda belum terdaftar !");
		window.open("loginClient.php","_SELF");
		</script><?php
			
		}
	elseif($num_rows > 0){ //jika user ada

			if ($num_rows['username']==$_SESSION['username'] && $num_rows['password']== $_SESSION['password']) {

		        $result = mysqli_query($koneksi, $sql);  
			        if(mysqli_num_rows($result) > 0) //jika produk ada 
			        {  
			             while($row = mysqli_fetch_array($result))  
			             {
			             	$_SESSION['idKonsumen'] = $row['idKonsumen'];
			             }
			         }

					?>
						<script>alert("anda berhasil login !");
						window.open("produk.php","_SELF");
						</script><?php

						if (isset($_POST['remember'])) {
							setcookie('cookie',$_SESSION['username'] , time() + (86400 * 30), "/"); // 86400 = 1 day
					}

					}
			else{
					?><script>alert("username atau password salah !");
					window.open("loginClient.php","_SELF");
					</script><?php
				}
			
	}
	
 ?>