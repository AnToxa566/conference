<?php
	namespace Core;
	


	/*
	** Базовый класс контроллера
	*/
	class Controller
	{
		/* Шаблон для HTML */
		protected $layout = 'default';
		/* Тайтл страницы */
		protected $title = 'Default';
		


		/*
		** Метод, который возвращает объект страницы для отображения в представление
		*/
		protected function render($view, $data = []) {
			return new Page($this->layout, $this->title, $view, $data);
		}
	}
?>