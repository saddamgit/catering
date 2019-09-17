<?php include"header.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>cateringku</title>
</head>
<style type="text/css">
	form{
		color: white;
		font-family: arial;
	}
	h3{
		color: #591e08;
		font-family: arial;
	}
	fieldset{
		width: 400px;
		margin-top: 10px;
		background-color: transparent;
		border-radius: 10px;
		background-color: lightgrey;
	}
	input{
		height: 25px;
		border-radius: 5px;
	}

	textarea{
		border-radius: 5px;
		width: 175px;
	}
	a{
		text-decoration: none;
	}

</style>
<body> 

<center>
<fieldset>
<h3>SIGN UP CATERINGKU</h3>

<form action="prosesSignup.php" method="POST">

	<table>
		<tr>
			<td>Username</td>
			<td></td>
			<td><input type="text" name="userName" placeholder="Username" required></input></td>
		</tr>
		<tr>
			<td>No-Handphone</td>
			<td></td>
			<td><input type="text" name="nohp" placeholder="no-handphone" required></input></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td></td>
			<td><input type="email"  name="email" placeholder="email" required></input></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td></td>
			<td><textarea name="alamat" rows="5" placeholder="alamat"></textarea></td>
		</tr>
		<tr>
			<td>Password</td>
			<td></td>
			<td><input type="text" name="password" placeholder="password" required></input></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
			<input type="reset" value="reset" name="reset" id="btn" style="cursor: pointer;"></input>
			<input type="submit" value="daftar" name="signup" id="btn" style="cursor: pointer;"></input>
			</td>
		</tr>
	</table>
	
	
</form>
<a href="index.php"><button style="color: blue;cursor: pointer;" >kembali</button>  </a>
</fieldset>
</center>
</body>
</html>