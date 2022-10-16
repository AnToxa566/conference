<?php
	namespace Core;
	


	/*
	** Диспетчер
	*/
	class Dispatcher
	{
		/*
		** Метод, который пытается вырнуть экземпляр класса хранящий значения для построения представления.
		*/
		public function getPage(Track $track)
		{
			/* Получаем название класса контроллера и его путь */

			$className = ucfirst($track->controller) . 'Controller';
			$fullName = "\\Project\\Controllers\\$className";
			
			/* Пытаемся создать экземпляр полученного класса */

			try {
				$controller = new $fullName;
				
				/* Проверяем наличие метода в классе */

				if (method_exists($controller, $track->action)) {

					/* Пытаемся получить страницу из метода */

					$result = $controller->{$track->action}($track->params);
					
					if ($result) {
						return $result; 				// Возвращаем страницу
					} 
					else {
						return new Page('default');		// Или создаём по дефолту
					}
				} 
				else {

					/* Информационный вывод при отсутствие заданного метода в классе */

					echo "Метод <b>{$track->action}</b> не найден в классе $fullName."; die(); 
				}
			} 
			catch (\Exception $error) {

				/* Обработка ошибок */

				echo $error->getMessage(); die();
			}
		}
	}
?>