<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Conference;
	


	/*
	** Контрллер работы с конференциями
	*/
	class ConferenceController extends Controller
	{
		/*
		** Create - Создание конференции
		*/
		public function add() {
			$params = array();

			$params['title'] = $_POST['title'];

			$date = $_POST['date'];
			$time = $_POST['time'];

			$dateTimeEvent = $date . ' ' . $time;
			$params['dateTimeEvent'] = $dateTimeEvent;

			if ($_POST['latitude'] == '' || $_POST['longitude'] == '')
			{
				$params['latitude'] = NULL;
				$params['longitude'] = NULL;
			}
			else
			{
				$params['latitude'] = $_POST['latitude'];
				$params['longitude'] = $_POST['longitude'];
			}
			
			$params['country'] = $_POST['country'];

			(new Conference)->add($params);
			header('Location: /conferences/');
		}



		/*
		** Read - Вывод всех конференций
		*/
		public function getAll() {
			$this->title = 'Conferences';
			
			$conferences = (new Conference)->getAll();
			return $this->render('conference/all', [
				'conferences' => $conferences,
				'title' => $this->title
			]);
		}



		/*
		** Read - Вывод одной конференции по id
		*/
		public function getById($params) {			
			$conference = (new Conference)->getById($params['id']);
			$this->title = $conference['title'];

			return $this->render('conference/one', [
				'conference' => $conference,
				'title' => $this->title
			]);
		}



		/*
		** Update - Обновление конференции по id
		*/
		public function update($id) {
			$params = array();

			$params['id'] = $id['id'];
			$params['title'] = $_POST['title'];

			$date = $_POST['date'];
			$time = $_POST['time'];

			$dateTimeEvent = $date . ' ' . $time;
			$params['dateTimeEvent'] = $dateTimeEvent;

			if ($_POST['latitude'] == '' || $_POST['longitude'] == '')
			{
				$params['latitude'] = NULL;
				$params['longitude'] = NULL;
			}
			else
			{
				$params['latitude'] = $_POST['latitude'];
				$params['longitude'] = $_POST['longitude'];
			}
			
			$params['country'] = $_POST['country'];

			(new Conference)->update($params);
			header('Location: /conference/'.$params['id'].'/');
		}



		/*
		** Delete - Удаление конференции по id
		*/
		public function delete($params) {
			$id = $params['id'];

			(new Conference)->delete($id);
			header('Location: /conferences/');
		}
	}
?>