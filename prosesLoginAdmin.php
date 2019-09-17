<?php 
	session_start();
	$_SESSION['username'] = $_POST['userName'];
	$_SESSION['password'] = $_POST['password'];

	include "koneksi.php";
	$sql = "SELECT username,password FROM tb_admin where username = '".$_SESSION['username']."'";

	$result = mysqli_query($koneksi,$sql);
	$num_rows = mysqli_fetch_assoc($result);

	if ($num_rows == 0) {//jika user tidak ada

		?><script>alert("anda belum terdaftar !");
		window.open("loginAdmin.php","_SELF");
		</script><?php
			
		}
	elseif($num_rows > 0){ //jika user ada

		if ($num_rows['username']==$_SESSION['username'] && $num_rows['password']== $_SESSION['password']) {
			?><script>alert("anda berhasil login !");
		window.open("adminProduk.php","_SELF");
		</script><?php

			if (isset($_POST['remember'])) {
				setcookie('cookie',$_SESSION['username'] , time() + (86400 * 30), "/"); // 86400 = 1 day
			}

		}else{
			?><script>alert("username atau password salah !");
		window.open("loginAdmin.php","_SELF");
		</script><?php
		}
			
	}
	
 ?>