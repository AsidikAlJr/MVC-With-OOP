<?php
	
	class AnggotaModel
	{
		
		public function openDBConnection()
		{
			$link = new PDO('mysql:host=localhost;dbname=db_oopmvc', 'root', '');
			return $link;
		}

		public function closeDBConnection(&$link)
		{
			$link = null;
		}

		public function getAllAnggota()
		{
			$link = $this->openDBConnection();

			$result = $link->query("SELECT id, nama FROM anggota");

			$anggota = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$anggota[] = $row;
			}

			$this->closeDBConnection($link);

			return $anggota;
		}
		public function getAnggotabyId($id)
		{
			$link = $this->openDBConnection();

			$query = "SELECT * FROM anggota WHERE id = :id";
			$statement = $link->prepare($query);
			$statement->bindValue(':id', $id, PDO::PARAM_INT);
			$statement->execute();

			$row = $statement->fetch(PDO::FETCH_ASSOC);

			$this->closeDBConnection($link);

			return $row;
		}
	}
?>