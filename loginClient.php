<?php include "header.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>cateringku</title>
</head>
<body>
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
	
	textarea{
		border-radius: 5px;
		width: 175px;
	}
	a{
		text-decoration: none;
	}
	label{
		color: black;
	}
	#btn{
		width: 80px;
	}
	

</style>

<center>
<fieldset>
<h3>Login as client</h3>

<form action="prosesLoginClient.php" method="POST">

	<table>
		<tr>
			<td>Username</td>
			<td></td>
			<td><input type="text" name="userName" placeholder="Username" required></input></td>
		</tr>
		<tr>
			<td>Password</td>
			<td></td>
			<td><input type="password" name="password" placeholder="password" required></input></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
			<input type="reset" value="reset" name="reset" id="btn"></input>
			<input type="submit" value="login" name="login" id="btn"></input>
			</td>
		</tr>
	</table>
	<br><br>
	<input type="checkbox" name="remember" id="remember"><label>Remember Me</label></input>
	<br><br>
	<label>belum punya akun?</label> <a href="signup.php">daftar</a><br><br>
	
</form>
<a href="index.php"><button style="color: blue;cursor: pointer;" >kembali</button>  </a>
</fieldset>

</center>



</body>
</html>
