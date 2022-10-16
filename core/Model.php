<?php
	namespace Core;
	use \PDO;
	


	/*
	** Базовый класс модели
	*/
	class Model
	{
		/* PHP Data Objects */
		private static $pdo;
		


		/*
		** Инициализация PDO
		*/
		public function __construct()
		{
			if (!self::$pdo) {
				$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
				self::$pdo = new PDO($dsn, DB_USER, DB_PASS);
			}
		}
		


		/*
		** Метод, который возвращает один элемент из БД
		*/
		protected function findOne($query)
		{
			$query = self::$pdo->query($query);
			return $query->fetch(PDO::FETCH_ASSOC);
		}
		


		/*
		** Метод, который возвращает множество элементов из БД
		*/
		protected function findMany($query)
		{
			$query = self::$pdo->query($query);
			$data = array();

			while ( $row = $query->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}

			return $data;
		}



		/*
		** Метод, который добавляет конференцию в БД
		*/
		protected function addToDB($params)
		{
			$title = $params['title'];
			$dateTimeEvent = $params['dateTimeEvent'];
			$latitude = $params['latitude'];
			$longitude = $params['longitude'];		
			$country = $params['country'];

			$sql = 'INSERT INTO `conferences` (`title`, `dateTimeEvent`, `latitude`, `longitude`, `country`) 
					VALUES (?, ?, ?, ?, ?)';

			$query = self::$pdo->prepare($sql);
			$query->execute([$title, $dateTimeEvent, $latitude, $longitude, $country]);
		}



		/*
		** Метод, который обновляет конференцию в БД
		*/
		protected function updateInDB($params)
		{
			$id = $params['id'];
			$title = $params['title'];
			$dateTimeEvent = $params['dateTimeEvent'];
			$latitude = $params['latitude'];
			$longitude = $params['longitude'];		
			$country = $params['country'];

			$sql = "UPDATE `conferences` SET `title` = ?, `dateTimeEvent` = ?, `latitude` = ?, `longitude` = ?, `country` = ? WHERE `id` = ?";
			$query = self::$pdo->prepare($sql);
			$query->execute([$title, $dateTimeEvent, $latitude, $longitude, $country, $id]);
		}



		/*
		** Метод, который удаляет конференцию из БД
		*/
		protected function deleteById($id)
		{
			$sql = 'DELETE FROM `conferences` WHERE `id` = ?';
			$query = self::$pdo->prepare($sql);
			$query->execute([$id]);
		}
	}
?>