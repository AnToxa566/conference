<?php
	namespace Project\Controllers;
	use \Core\Controller;
	


	/*
	** Контрллер выдачи ошибок пользователю
	*/
	class ErrorController extends Controller
	{
		/*
		** Метод отображающий ошибку об не найденой странице
		*/
		public function notFound() {
			$this->title = 'Страница не найдена';
			
			return $this->render('error/notFound');
		}
	}
?>