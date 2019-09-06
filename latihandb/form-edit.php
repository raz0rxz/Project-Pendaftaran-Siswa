<?php  
session_start();

if(!isset($_SESSION["login"])) {

	header("Location: login.php");
	exit;
}


include("config.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Data </title>
	<link rel="stylesheet" href="style_login.css">
</head>

<body>
	<div class="kotak_login">
	<header>
		<h3 class="tulisan_login">Formulir Edit Siswa</h3>
	</header>
	
	<form action="proses-edit.php" method="POST" enctype="multipart/form-data">
		
		<fieldset>
			
			<input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
		
		<p>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" placeholder="nama lengkap" class="form_login" value="<?php echo $siswa['nama'] ?>" />
		</p>
		<p>
			<label for="alamat">Alamat: </label>
			<textarea name="alamat" class="form_login"><?php echo $siswa['alamat'] ?></textarea>
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label>
			<br>
			<?php $jk = $siswa['jenis_kelamin']; ?>
			<label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
			<br>
			<label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
		</p>
		<p>
			<label for="agama">Agama: </label>
			<?php $agama = $siswa['agama']; ?>
			<select name="agama" >
				<option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
				<option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
				<option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
				<option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
				<option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
			</select>
		</p>
		<p>
			<?php $tanggal_lahir = $siswa['tanggal_lahir']; ?>
			<label for="tanggal_lahir">Tanggal Lahir : </label>
			<label><input type="date" name="tanggal_lahir" class="form_login" min="1980-01-01"></label>
		</p>
		<p>
			<label for="sekolah_asal">Sekolah Asal: </label>
			<input type="text" name="sekolah_asal" placeholder="nama sekolah" class="form_login" value="<?php echo $siswa['sekolah_asal'] ?>" />
		</p>
		<p>
			<label for="gambar">Foto Profil : </label>
		<input type="file" name="gambar">
		</p>
		<p>
			<input type="submit" value="Simpan" name="simpan" class="tombol_login"/>
		</p>
		
		</fieldset>
		
	
	</form>
	</div>
	</body>
</html>
