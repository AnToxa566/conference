<?php
	namespace Core;
	


	/*
	** Класс хранящий свойства трекера
	*/
	class Track
	{
		private $controller;	// Контроллер
		private $action;		// Метод контроллера
		private $params;		// Параметры передающиеся в метод контроллера
		
		/*
		**	Инициализация свойств
		*/
		public function __construct($controller, $action, $params = [])
		{
			$this->controller = $controller;
			$this->action = $action;
			$this->params = $params;
		}
		
		/*
		**	Получение свойств
		*/
		public function __get($property)
		{
			return $this->$property;
		}
	}
