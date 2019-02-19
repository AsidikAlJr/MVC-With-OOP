<!--file:oopmvc/model/anggota_model.php-->
<?php 

	// Membuat koneksi ke database
	function openDBConnection()
	{
		$link = new PDO("mysql:host=localhost;dbname=db_oopmvc", 'root', '');
		return $link;
	}
	
	// Menutup koneksi ke database
	function closeDBConnection()
	{
		$link = null;
	}

	// Mendapatkan data anggota, dimana fungsi getAllAnggota() akan dipanggil dari file index.php
	function getAllAnggota()
	{
		$link = openDBConnection();

		$result = $link->query("SELECT id, nama FROM anggota");

		$anggota = array();
		// While => kondisi perulangan yang tidak dapat dipastikan banyaknya perulangan yang akan dilakukan
		// PDO :: FETCH_ASSOC : mengembalikan array yang diindeks oleh nama kolom seperti yang dikembalikan di set hasil Anda
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$anggota[] = $row;
		}
		closeDBConnection($link);

		return $anggota;
	}

	function getAnggotabyId($id)
	{
		$link = openDBConnection();

		$query = "SELECT * FROM anggota WHERE id=:id";
		$statement = $link->prepare($query);
		// bindValue digunakan untuk mengikat nilai ke parameter
		// bindValue(parameter, value/nilai, tipe data)
		$statement->bindValue(':id', $id, PDO::PARAM_INT); 
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);

		closeDBConnection($link);

		return $row;
	}