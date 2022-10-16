<?php
	namespace Core;
	


	/*
	** Класс хранящий свойства маршрутизации
	*/
	class Route
	{
		private $path;			// Путь в адрессной строке
		private $controller;	// Используемый контроллер
		private $action;		// Вызываемый у контроллера метод
		
		/*
		**	Инициализация свойств
		*/
		public function __construct($path, $controller, $action)
		{
			$this->path = $path;
			$this->controller = $controller;
			$this->action = $action;
		}
		
		/*
		**	Получение свойств
		*/
		public function __get($property)
		{
			return $this->$property;
		}
	}
?>