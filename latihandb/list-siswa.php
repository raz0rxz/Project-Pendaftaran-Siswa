<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Anggota Baru | Taichi Pelajar</title>
</head>

<body>
	<link rel="stylesheet" href="tablestyle.css" type="text/css">
	
	<br>
	
	<table>
	<thead>
		<tr>
			<caption style="font-size: 32px;">Daftar Siswa</caption>
			<th>No</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Agama</th>
			<th>Sekolah Asal</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM calon_siswa";
		$query = mysqli_query($db, $sql);
		
		while($siswa = mysqli_fetch_array($query)): ?>
			<tr>
			
			<td><?= $siswa['id'] ?></td>
			<td><img src="img/<?php echo $siswa["gambar"]?>" height="60px" width="60px"></td>
			<td><?= $siswa['nama']?></td>
			<td><?= $siswa['alamat']?></td>
			<td><?= $siswa['jenis_kelamin']?></td>
			<td><?= $siswa['tanggal_lahir']?></td>
			<td><?= $siswa['agama']?></td>
			<td><?= $siswa['sekolah_asal']?></td>
			
			<td class="tambahan">
			<a href="form-edit.php?id=<?= $siswa['id'] ?>" class="tombol satu">Edit</a>
			<a href="hapus.php?id=<?= $siswa['id'] ?>" class="tombol dua">Hapus</a>
			</td>
			
			</tr>
		<?php endwhile; ?>
		
	</tbody>
	</table>
	<p>Total: <?php echo mysqli_num_rows($query) ?></p>
	<nav class="baru">
		<a href="form-daftar.php"class="tombol satu">Tambah Baru</a>
		<a href="index.php"class="tombol dua">Halaman Utama</a>
	</nav>
	</body>
</html>
