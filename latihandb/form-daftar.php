<?php 
session_start();

if(!isset($_SESSION["login"])) {

	header("Location: login.php");
	exit;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Anggota Baru </title>
	<link rel="stylesheet" href="style_login.css">
</head>

<body>
	<div class="kotak_login">
	<header>
		<h3 class="tulisan_login">Formulir Pendaftaran Anak Baru</h3>
	</header>
	
	<form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
		
		<fieldset>
		
		<p>
			<label for="nama">Nama Anak: </label>
			<input type="text" name="nama" placeholder="Nama lengkap" class="form_login" required />
		</p>
		<p>
			<label for="alamat">Alamat Anak: </label>
			<textarea name="alamat" class="form_login" placeholder="Alamat" required></textarea>
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin Anak: </label>
			<br>
			<label><input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki</label>
			<br>
			<label><input type="radio" name="jenis_kelamin" value="perempuan" required> Perempuan</label>
		</p>
		<p>
			<label for="tanggal_lahir">Tanggal Lahir : </label>
			<label><input type="date" name="tanggal_lahir" class="form_login" min="1980-01-01"></label>
		</p>
		<p>
			<label for="agama">Agama Anak: </label>
			<select name="agama">
				<option>Islam</option>
				<option>Katholik</option>
				<option>Kristen</option>
				<option>Hindu</option>
				<option>Budha</option>
			</select>
		</p>
		<p>
			<label for="sekolah_asal">Sekolah Asal Anak: </label>
			<input type="text" name="sekolah_asal" placeholder="Nama sekolah" class="form_login" required />
		</p>
		<p>
			<label for="gambar">Foto Profil : </label>
		<input type="file" name="gambar">
		</p>
		<p>
			<input type="submit" value="Daftar" name="daftar" class="tombol_login" />
		</p>
		
		</fieldset>
	
	</form>
	</div>
	</body>
</html>
