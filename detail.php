<!-- Menambahkan Detail Page -->
<!-- file: oopmvc/detail.php -->
<!-- file ini berfungsi sebagai Controller untuk halaman detail. Dimana file ini memanggil Model, mendapatkan data anggota dan memanggil file View detail.php untuk menampilkan datanya -->
<?php 
	
	require_once 'model/anggota_model.php';

	$anggota = getAnggotabyId($_GET['id']);

	require 'view/anggota/detail.php';