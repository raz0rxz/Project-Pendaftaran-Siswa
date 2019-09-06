<?php
session_start();

if(!isset($_SESSION["login"])) {

	header("Location: login.php");
	exit;
}


include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	// ambil data dari formulir
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$tl = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$sekolah = $_POST['sekolah_asal'];
	//Gambar
			$ekstensi_diperbolehkan	= array('png','jpg');
			$gambar = $_FILES['gambar']['name'];
			$x = explode('.', $gambar);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['gambar']['size'];
			$file_tmp = $_FILES['gambar']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 10440700000){			
					move_uploaded_file($file_tmp, 'img/'.$gambar);
					if($query){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

	// buat query
	$sql = "INSERT INTO calon_siswa (gambar,nama, alamat, jenis_kelamin,tanggal_lahir, agama, sekolah_asal) VALUE ('$gambar','$nama', '$alamat', '$jk','$tl','$agama', '$sekolah')";
	$query = mysqli_query($db, $sql);

	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
