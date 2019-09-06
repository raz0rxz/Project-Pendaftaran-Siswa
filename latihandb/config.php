<?php

$server = "127.0.0.1";
$user = "root";
$password = "";
$nama_database = "pendaftaran_siswa";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

function registrasi($data) { 
	global $db;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($db,$data["password"]);
	$password2 = mysqli_real_escape_string($db,$data["password2"]);

	$result = mysqli_query($db,"SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('Username sudah terdaftar silahkan gunakan username lain')
		</script>";
		return false;

	}

	if( $password !== $password2) {
		echo "<script>
			alert('Konfirmasi password tidak sesuai')
		</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($db, "INSERT INTO user VALUES('','$username','$password')");
	return mysqli_affected_rows($db);
}
?>
