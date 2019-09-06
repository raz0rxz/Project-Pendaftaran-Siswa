<?php
session_start(); 

if(isset($_SESSION["login"])) {

	header("Location: index.php");
	exit;
}

require 'config.php';

if (isset ($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

	if(mysqli_num_rows($result) == 1 ) {

		$row = mysqli_fetch_assoc($result);

		if ($row['username'] == "admin") {
			

			if(password_verify($password, $row["password"])) {

				$_SESSION["login"] = true;

				header("Location: index.php");
				exit;
		}		

		}
		else if ($row['username'] == $username) {
			

			if(password_verify($password, $row["password"])) {

				$_SESSION["login"] = true;

				header("Location: index2.php");
				exit;
		}
		
		}
	}

	$error = true;


}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		 label{
		 	display: block;
		 }
	</style>
	<link rel="stylesheet" type="text/css" href="style_login.css">
</head>
<body>
<div class="kotak_login">
<p class="tulisan_login">Login</p>
<p class="tulisan_login">Pendaftaran Taichi Pelajar</p>
<form action="" method="post"> 
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" placeholder="Username" class="form_login">
		
		
			<label for="password">Password : </label>
			<input type="password" name="password" id="password" placeholder="Password" class="form_login">
		
		<p>Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
		
			<button type="submit" name="login" class="tombol_login">Login</button>
		
</form>
<?php if (isset($error)) : ?>
	<p style="color : red";>*username/password salah</p>
<?php endif; ?>
</div>
</body>
</html>