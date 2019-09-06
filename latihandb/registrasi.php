<?php 
require 'config.php';
	if (isset($_POST["register"])) {
		
		if (registrasi($_POST) > 0) {

			echo "<script>
				alert('User baru berhasil ditambahkan');  window.location.href = './login.php';
			</script>";

		}

		else {
			echo mysqli_error($db);
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<style>
		 label{
		 	display: block;
		 }
	</style>
	<link rel="stylesheet" href="style_login.css">
</head>
<body>

<div class="kotak_login">
<p class="tulisan_login">Halaman Registrasi</p>

<form action="" method="post"> 
	
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" placeholder="Username" class="form_login">
	
			<label for="password">Password : </label>
			<input type="password" name="password" id="password" placeholder="Password" class="form_login">
	
			<label for="password2">Konfirmasi Password : </label>
			<input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" class="form_login">
			<p>Sudah punya akun? <a href="login.php">Login Disini</a></p>
	
			<button type="submit" name="register" class="tombol_login">Sign-up</button>
</form>
</div>
</body>
</html>