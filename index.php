<?php 

	// file:oopmvc/index.php
	// Memisahkan Domain Logic
	// Dimana kita perlu memisahkan kode untuk mendapatkan data (Model) dengan kode alur aplikasi(Controller)
	// Jadi file index.php sebagai pengatur aliran program (Controller)
	// require_once 'model/anggota_model.php';
	// require_once 'controller/anggota.php';

	// $anggota = getAllAnggota();

	// Memisahkan Presentation/Penampilan Data
	// $link = new PDO("mysql:host=localhost;dbname=db_oopmvc", 'root', '');
	// $result = $link->query("SELECT id, nama FROM anggota");

	// $anggota = array();
	// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	// 	$anggota[] = $row;
	// }

	// $link = null; // Menampilkan halaman kosong ketika closeDBConnection

	// Memanggil list.php untuk menampilkan anggota
	// require 'view/anggota/list.php';


	// Front Controller --> memanggil semua resource yang diperlukan di front controller, sedangkan controller setiap halaman akan dipanggil kemudian.
	// Dan controller setiap halaman akan dpt menggunakan resource di front controller.
	
	// fungsi preg_replace untuk mengganti karakter yang tidak diinginkan seperti "|/*(.+?)/*$|".
	// Secara umum untuk sruktur penulisan dari fungsi preg_replace ini yaitu : preg_replace(pattern, replacement, subject)
	// fungsi dari pre_replace ini juga bisa kita gunakan untuk validasi form jadi kita membatasi karakter inputan yang masuk kedalam database.
	$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['REQUEST_URI']);

	// explode digunakan untuk menkonversi string menjadi array. Dalam memecah sebuah string menjadi array, fungsi explode() membutuhkan beberapa argumen.
	// Secara umum untuk sruktur penulisan dari fungsi explode ini yaitu : explode(delimiter, string)
	// misal, /blog/oke maka yg diexplode jadikan array sesuai dengan indikasi kita
	$uri = explode('/', $request);

	$uri0 = isset($uri[0]);
	$uri1 = isset($uri[1]);
	$id = isset($_GET['id']);

	// Routing dan menjalankan method yang sesuai URL
	if ($uri0 == 'anggota' && $uri1 == 'detail' && $id) {
		require_once "controller/Anggota.php";
		require_once "model/AnggotaModel.php";
		$model = new AnggotaModel();
		$controller = new Anggota($model);
		$id = $_GET['id'];
		$controller->detail($id);
	} elseif ($uri0 == 'anggota' && $uri1) {
		require_once "controller/Anggota.php";
		require_once "model/AnggotaModel.php";
		$model = new AnggotaModel();
		$controller = new Anggota($model);
		$controller->index();
	} else {
		header('HTTP/1.1 404 Not Found');
		echo "<html><body><h1>Error 404 Bosque:D</h1></body></html>";
	}