<?php
	namespace Core;

	/* Все ошибки будут попадать в отчёт */

	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	
	/* Подключаем константы для поделючения к БД */

	require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';
	
	/* Реализация метода автозагрузки */

	spl_autoload_register(function($class) {

		/* Проверяем на соответствие паттерну */

		preg_match('#(.+)\\\\(.+?)$#', $class, $match);
		
		$nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1])); // Получаем имя пространства имён
		$className = $match[2];														// Получаем имя класса
		
		/* Строим полный путь к классу */

		$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';
		
		/* Проверяем на наличие в проекте пути к данному классу */

		if (file_exists($path)) {

			/* Подключаем класс */

			require_once $path;
			
			/*  Проверяем, был ли класс объявлен */

			if (class_exists($class, false)) {
				return true;
			} 
			else {

				/* При отсутствие класса в пути выдаём ошибку */

				throw new \Exception("Класс $class не найден в файле $path.");
			}
		} 
		else {

			/* При отсутствие пути к классу выдаём ошибку */

			throw new \Exception("Для класса $class не найден файл $path.");
		}
	});
	
	/* Подключаем все маршруты */

	$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';
	
	$track = ( new Router )      -> getTrack($routes, $_SERVER['REQUEST_URI']); // Получение трека по uri
	$page  = ( new Dispatcher )  -> getPage($track);							// Получение страницу по значениям из трека
	
	/* Отрисовуем представление по полученной странице */

	echo (new View) -> render($page);
?>