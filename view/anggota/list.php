<!--file:oopmvc/view/anggota/list.php-->
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Daftar Anggota</title>
</head>
<body>
	<h3>DAFTAR ANGGOTA</h3>
	<ul>
		<?php foreach ($anggota as $row): ?>
		<li>
			<a href="detail.php?id=<?= $row['id'] ?>"><?= $row['nama'] ?></a>
		</li>
		<?php endforeach ?>
	</ul>
</body>
</html> -->
<!-- Kita mendefinisikan semua variable file list.php memanggil file template.php di akhir program -->
<?php $judul = 'Daftar Anggota' ?>
<!-- ob_start() digunakan untuk mengaktifkan penyimpanan output pada browser terhadap halaman tertentu. Tujuan dari pengaktifan penyimpanan output buffer adalah agar output php yang dihasilkan pada halaman website yang sudah di load secara penuh dapat tersimpan, sehingga ketika user mereload halaman website, browser tidak perlu lagi menarik ulang data / output yang sudah tersimpan. -->
<!-- ob_start => untuk mengaktifkan output buffering -->
<?php ob_start() ?> 
	<h1>Daftar Anggota</h1>
	<ul>
		<?php foreach ($anggota as $row): ?>
			<li>
				<a href="detail?id=<?= $row['id'] ?>"><?= $row['nama'] ?></a>
			</li>
		<?php endforeach ?>
	</ul>
<!-- ob_get_clean => menampilkan data atau sebagai output data -->
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>
	