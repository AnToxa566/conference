<?php
	namespace Project\Models;
	use \Core\Model;



	/*
	** Модель стран
	*/
	class Country extends Model
	{	
		/* 
		** Read - Получить все страны
		*/
		public function getAll()
		{
			return $this->findMany("SELECT `country_name` FROM `countries` ORDER BY `countries`.`country_name` ASC");
		}
	}
?>