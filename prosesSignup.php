<?php  
	$userName = $_POST['userName'];
	$nohp = $_POST['nohp'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$pass = $_POST['password'];
	include 'koneksi.php';

	$sqlCheck = "SELECT username FROM tb_konsumen WHERE username = '".$userName."'";

	//cek jika ada username yang sama
	$resultCheck = mysqli_query($koneksi,$sqlCheck);
	$num_rows = mysqli_num_rows($resultCheck);
	if ($num_rows > 0) { //jika user ada

		?><script>alert('username sudah ada yang punya, coba username lain !');
			window.open("signup.php","_SELF");
		</script><?php
		
	}else{
		$sql = "INSERT INTO tb_konsumen (username, nohp, email, alamat, password) VALUES('".$userName."', '".$nohp."', '".$email."', '".$alamat."','".$pass."')";
			$result = mysqli_query ($koneksi, $sql);
			if ($result) {
					//echo "berhasil daftar!";
					?><script>alert("anda berhasil daftar");
					window.open("loginClient.php","_SELF");
					</script><?php
					//header("location:login.php");
				}	
				else
				{
					?><script>alert("anda gagal daftar");
					window.open("signup.php","_SELF");
					</script><?php
					//echo "gagal";
					//header("location:signup.php");
				}
	}

?>