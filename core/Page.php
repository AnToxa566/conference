<?php
	namespace Core;
	


	/*
	** Класс хранящий свойства страницы
	*/
	class Page
	{
		private $layout; 	// Шаблон
		private $title;		// Тайтл страницы
		private $view;		// Путь к представлению
		private $data;		// Передающиеся на страницу данные
		
		/*
		**	Инициализация свойств
		*/
		public function __construct($layout, $title = '', $view = null, $data = [])
		{
			$this->layout = $layout;
			$this->title  = $title;
			$this->view   = $view;
			$this->data   = $data;
		}
		
		/*
		**	Получение свойств
		*/
		public function __get($property)
		{
			return $this->$property;
		}
	}
