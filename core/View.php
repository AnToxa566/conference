<?php
	namespace Core;
	


	/*
	** Базовый класс представления
	*/
	class View
	{
		/*
		** Метод, который возвращает подключение всего представления
		*/
		public function render(Page $page) {
			return $this->renderLayout($page, $this->renderView($page));
		}
		
		/*
		** Метод, который возвращает подключение шаблона представления
		*/
		private function renderLayout(Page $page, $content) {
			$layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/project/layouts/{$page->layout}.php";
			
			if (file_exists($layoutPath)) {
				ob_start();

					$title = $page->title;
					include $layoutPath;

				return ob_get_clean();
			} 
			else {
				echo "Не найден файл с шаблоном по пути $layoutPath"; die();
			}
		}
		
		/*
		** Метод, который возвращает подключение контента представления
		*/
		private function renderView(Page $page) {
			if ($page->view) {
				$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/project/views/{$page->view}.php";
				
				if (file_exists($viewPath)) {
					ob_start();

						$data = $page->data;
						extract($data);
						include $viewPath;

					return ob_get_clean();
				} 
				else {
					echo "Не найден файл с представлением по пути $viewPath"; die();
				}
			}
		}
	}
?>