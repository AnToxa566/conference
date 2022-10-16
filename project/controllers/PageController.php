<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Conference;
	use \Project\Models\Country;
	


	/*
	** Контрллер страниц создания и редактирования
	*/
	class PageController extends Controller
	{
		/*
		** Метод создания страницы "Организации конференции"
		*/
		public function schedulePage() {
			$this->title = 'Организовать конференцию';
			$contries = (new Country)->getAll();

			return $this->render('page/schedulePage', [
				'title' => $this->title,
				'contries' => $contries
			]);
		}



		/*
		** Метод создания страницы "Редактирования конференции"
		*/
		public function updatePage($params) {
			$conference = (new Conference)->getById($params['id']);
			$contries = (new Country)->getAll();

			$this->title = 'Редактировать '.$conference['title'];

			return $this->render('page/updatePage', [
				'title' => $this->title,
				'conference' => $conference,
				'contries' => $contries
			]);
		}
	}
?>