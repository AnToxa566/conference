<?php
	namespace Project\Models;
	use \Core\Model;
	


	
	/*
	** Модель конферегции
	*/
	class Conference extends Model
	{	
		/* 
		** Create - Добавить конференцию в БД
		*/
		public function add($params)
		{
			$this->addToDB($params);
		}



		/* 
		** Read - Получить конференцию по id 
		*/
		public function getById($id)
		{
			return $this->findOne("SELECT * FROM conferences WHERE id=$id");
		}



		/* 
		** Read - Получить все конференции 
		*/
		public function getAll()
		{
			return $this->findMany("SELECT * FROM conferences");
		}



		/* 
		** Update - Обновить конференцию 
		*/
		public function update($params)
		{
			$this->updateInDB($params);
		}



		/* 
		** Delete - Удалить конференцию из БД по id
		*/
		public function delete($id)
		{
			return $this->deleteById($id);
		}
	}
?>