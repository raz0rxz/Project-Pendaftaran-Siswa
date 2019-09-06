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
		<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Pendaftaran Anggota Baru </title>
	<style>
		body {
 background-color:white;
 font-family:verdana, Helvetica, sans-serif;
 color:#000;
}
h1{
	text-align: center;
	font-family:verdana, Helvetica, sans-serif;
 	color:black;
}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Taichi</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="btn btn-dark" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="btn btn-dark" href="form-daftar.php">Daftar Baru</a>
	      </li>
	      <li class="nav-item">
	        <a class="btn btn-dark" href="list-siswa.php">List Pendaftar</a>
	      </li>
	      <li class="nav-item">
	        <a class="btn btn-dark" href="logout.php">Logout</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<br>
	<br>
	<h1>
		Pendaftaran Anggota Taichi Pelajar Se-Kota Surakarta
	</h1>
	<br>
	<br>
	<p class="container">
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDibuka Pendaftaran Taichi Pelajar Se-Kota Surakarta. Bagi siswa yang berminat silahkan mengisi form pendaftaran dengan memilih menu daftar baru di tab action. Dan bagi yang sudah mendaftar bisa melihat daftar anda di menu list pendaftar. Mari menjadi anggota taichi pelajar yang berprestasi dan memiliki sikap dan karakter yang baik. 
	</p>
	<center>
	<img src="taichi.png" style="width: 350px; height: 350px">
	</center>
	<? if(isset($_GET['status'])): ?>
	<p>
		<?php
			if($_GET['status'] == 'sukses'){
				echo "Pendaftaran siswa baru berhasil!";
			} else {
				echo "Pendaftaran gagal!";
			}
		?>
	</p>
	<? endif; ?>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
	</body>
</html>
