
<!-- Базовый шаблон для всех HTML-страниц -->

<!DOCTYPE html>
<html>
	<head>

		<!-- Required meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    	<!-- Reset CSS -->
    	<link rel="stylesheet" type="text/css" href="/project/webroot/css/reset.css">

    	<!-- My CSS file -->
    	<link rel="stylesheet" type="text/css" href="/project/webroot/css/styles.css">

    	<!-- Font Montserrat 500 600 700 -->
    	<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">

		<!-- ICO -->
		<link rel="shortcut icon" href="/project/webroot/img/ico/logo.ico" type="image/x-icon">

		<title><?= $title ?></title>

	</head>

	<body class="d-flex flex-column min-vh-100">

		<!-- Header -->
		<?php 
			include 'header.php';
		?>

		<!-- Main Content -->
		<?= $content ?>

		<!-- Footer -->
		<?php 
			include 'footer.php';
		?>

		<!-- My JS file -->
		<script src="/project/webroot/js/script.js"></script>

		<!-- Optional JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

	    <!-- Google Maps API JS -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH_gJhMm19A-BF1KDzmtNX7eiaZbpW1g&callback=initMap&v=weekly" defer></script>
	</body>
</html>
