<!DOCTYPE html>
<html>
<head>
	<title><?= $this->pageName; ?> - <?= Conf::$settings['keywords']['title'];?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" type="image/png" href="<?= BASE_URL; ?>webroot/img/favicon.png" />

	<!-- DESCRIPTION -->
	<meta name="description" content="<?= Conf::$settings['keywords']['description'];?>" />
	<meta name="keywords" content="<?= Conf::$settings['keywords']['keywords'];?>" />
	<meta property="og:type" content="company" />
	<meta property="og:title" content="Activ Gaming" />
	<meta property="og:image" content="" />
	<meta property="og:description" content="<?= Conf::$settings['keywords']['description'];?>" />
	<meta property="og:url" content="https://activ-gaming.com" />
	<meta property="og:site_name" content="Activ Gaming" />

	<!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>webroot/fontawesome/css/solid.css" />
	<link rel="stylesheet" href="<?= BASE_URL; ?>webroot/fontawesome/css/regular.css" />
	<link rel="stylesheet" href="<?= BASE_URL; ?>webroot/fontawesome/css/brands.css" />
	<link rel="stylesheet" href="<?= BASE_URL; ?>webroot/fontawesome/css/fontawesome.css" />
	
	<!-- MAIN CSS -->
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>webroot/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>webroot/css/cv.css">

	<!-- HEADLINE CSS -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>webroot/css/headline/style.css">
	<script src="<?= BASE_URL; ?>webroot/js/headline/modernizr.js"></script>
	<?php if($this->isMobile()): ?>
		<!-- <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>webroot/css/mobile.css"> -->
	<?php endif; ?>
</head>
<body>
	<!-- HEADER -->
	<header class="header text-center">
		<h1 class="header-name">Guillian Aufrère</h1>
		<h2 class="header-function cd-headline letters type">
			<span>&nbsp;</span> 
			<span class="cd-words-wrapper waiting">
				<b class="is-visible">Développeur web</b>
				<b>Développeur web en formation</b>
			</span>
		</h2>
	</header>

	<!-- NAVIGATION -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto text" id="navbar">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
			    <a class="nav-link" href="<?= BASE_URL; ?>#presentation">Présentation <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?= BASE_URL; ?>#competences">Compétences</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?= BASE_URL; ?>#realisations">Réalisations</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?= BASE_URL; ?>#experiences">Expériences</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?= BASE_URL; ?>#formations">Formations</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="<?= BASE_URL; ?>#motivations">Motivations</a>
			  </li>
			</ul>

			<ul class="navbar-nav form-inline my-2 my-lg-0">
			  <li class="nav-item">
			    <a class="nav-link" href="<?= Conf::$settings['network']['git']; ?>" target="_blank">
			    	GitHub <i class="fas fa-code"></i>
			    </a>
			  </li>
			</ul>
		</div>
	</nav>
	<?= $content_for_layout; ?>

	<footer>
	  <span>&copy; 2018 Curriculum Vitae par Aufrère Guillian |</span>
	  <a href="legual">Mentions légales |</a>
	  <a href="mailto:<?= Conf::$settings['network']['mail']; ?>">Mail |</a>
	  <a href="mailto:<?= Conf::$settings['network']['facebook']; ?>">Facebook</a>
	</footer>

	<script type="text/javascript">
		// When the user scrolls the page, execute myFunction 
		window.onscroll = function() {myFunction()};

		// Get the navbar
		var navbar = document.getElementById("navbar");

		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  } else {
		    navbar.classList.remove("sticky");
		  }
		}
	</script>
    <script src="<?= BASE_URL; ?>webroot/js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL; ?>webroot/js/bootstrap.js"></script>
    <script src="<?= BASE_URL; ?>webroot/js/headline/main.js"></script>
</body>
</html>