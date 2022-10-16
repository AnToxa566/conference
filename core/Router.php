<?php
	namespace Core;



	/*
	** Маршрутизатор
	*/
	class Router
	{
		/*
		** Метод, который провереят среди всех путей совпадение по паттерну с uri пришедшим из ардессной строки и при совпадение ** возвращает трекер хранящий значения вызывающегося контроллера, его метода, и передаваемых в метод параметров.
		**
		** В обратном случае данный метод вернет трек, который в дальнейшем вызовет страницу ошибки.
		*/
		public function getTrack($routes, $uri)
		{
			foreach ($routes as $route) {
				$pattern = $this->createPattern($route->path);
				
				if (preg_match($pattern, $uri, $params)) {
					$params = $this->clearParams($params);
					return new Track($route->controller, $route->action, $params);
				}
			}
			
			return new Track('error', 'notFound');
		}
		
		/*
		** Метод, который преобразует путь в паттерн для проверки uri
		*/
		private function createPattern($path)
		{
			return '#^' . preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?$#';
		}
		
		/*
		** Метод, в котором "подчищаем" параметры
		*/
		private function clearParams($params)
		{
			$result = [];
			
			foreach ($params as $key => $param) {
				if (!is_int($key)) {
					$result[$key] = $param;
				}
			}
			
			return $result;
		}
	}
?>