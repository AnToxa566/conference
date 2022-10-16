<?php
	use \Core\Route;
	
	/*
	** Маршрутизаторы
	*/
	return [
		new Route('/conferences/', 'conference', 'getAll'),
		new Route('/conference/:id/', 'conference', 'getById'),
		new Route('/conference/delete/:id/', 'conference', 'delete'),

		new Route('/schedule/', 'page', 'schedulePage'),
		new Route('/schedule/save/', 'conference', 'add'),

		new Route('/update/:id/', 'page', 'updatePage'),
		new Route('/update/save/:id/', 'conference', 'update'),
	];
?>