<!-- file : oopmvc/view/anggota/detail.php -->
<?php $judul = $anggota['nama'] ?>

<?php ob_start() ?>
	<h1><?= $anggota['nama'] ?></h1>
	<p>Nama : <?= $anggota['nama'] ?></p>
	<p>Tanggal Lahir : <?= $anggota['tanggal_lahir'] ?></p>
	<p>Kota Lahir : <?= $anggota['kota_lahir'] ?></p>
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php';