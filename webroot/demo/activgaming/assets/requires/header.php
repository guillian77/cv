<!--
COPYRIGHT (C) ACTIV GAMING 2016
Edited by Dekadmin
contact@activ-gaming.com
http://activ-gaming.com

Communauté Multigaming Francophone Française
-->

<!DOCTYPE HTML>
<html lang = "fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
		<title><?= $conf['web']['title']; ?></title>
		<meta content="IE=edge" http-equiv="X-UA-Compatible" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />

		<meta name="description" content="<?= $conf['web']['description']; ?>" />
		<meta name="keywords" content="<?= $conf['web']['keywords']; ?>" />
		<meta property="og:type" content="company" />
		<meta property="og:title" content="Activ Gaming" />
		<meta property="og:image" content="" />
		<meta property="og:description" content="<?= $conf['web']['description']; ?>" />
		<meta property="og:url" content="http://activ-gaming.com" />
		<meta property="og:site_name" content="Activ Gaming" />

		<!-- DISALLOW USERAGENT -->
		<meta name="robots" content="noindex, nofollow">

		<!-- GOOGLE SIGN IN SYSTEM -->
		<meta name="google-signin-client_id" content="121145679517-atorcg5ltlk806kkuqiucm5n21s3f0n3.apps.googleusercontent.com">
		<link rel="shortcut icon" type="image/png" href="favicon.ico" />
		<script src="assets/jscript/google-analytics.js"></script>

		<!-- LINK STYLESHEETS -->
		<link rel="stylesheet" type="text/css" href="assets/css/reset.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/dat-menu.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/main.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/blog.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="assets/css/activ.css" media="screen" />
		
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:300,400,700|Source+Sans+Pro:300,400,600,700&amp;subset=latin,latin-ext" />
		<!--[if lt IE 9 ]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			#featured-img-1 {
				background-image: url(assets/images/banners/overwatch.jpg);
			}
			#featured-img-2 {
				background-image: url(assets/images/banners/lol.jpg);
			}
			#featured-img-3 {
				background-image: url(assets/images/banners/wow.jpg);
			}
			#featured-img-4 {
				background-image: url(assets/images/banners/minecraft.jpg);
			}

			/* Man content & sidebar top lne, default #256193 */
			#sidebar .panel,
			#main-box #main {
				border-top: 5px solid #c22828;
			}

			/* Slider colors, default #256193 */
			a.featured-select,
			#slider-info .padding-box ul li:before,
			.home-article.right ul li a:hover {
				background-color: #313131;
			}

			/* Button color, default #256193 */
			.panel-duel-voting .panel-duel-vote a {
				background-color: #c22828;
			}

			/* Menu background color, default #000 */
			#menu-bottom.blurred #menu > .blur-before:after {
				background-color: #000;
			}

			/* Top menu background, default #0D0D0D */
			#header-top {
				background: #0D0D0D;
			}

			/* Sidebar panel titles color, default #333333 */
			#sidebar .panel > h2 {
				color: #333333;
			}

			/* Main titles color, default #353535 */
			#main h2 span {
				color: #353535;
			}

			/* Selection color, default #256193 */
			::selection {
				background: #313131;
			}

			/* Links hover color, default #256193 */
			.article-icons a:hover,
			a:hover {
				color: #313131;
			}

			/* Image hover background, default #256193 */
			.article-image-out,
			.article-image {
				background: #313131;
			}

			/* Image hover icons color, default #256193 */
			span.article-image span .fa {
				color: #313131;
			}
		</style>
	</head>

	<!-- PREVIEW -->
	<style type="text/css"> .preview-nav {background-color: #c22828; padding: 25px 40px; position: fixed; top: 0; left: 0; display: inline-block; z-index: 9999999; } .preview-nav a {color: #fff; text-transform: uppercase; } </style>
	<nav class="preview-nav">
		<a href="http://guillian-aufrere.fr/#realisations">Retourner sur mon CV</a>
	</nav>
	<!-- // -->
	
	<?php if ($_GET['page'] == "home" OR empty($_GET['page'])): ?>
	<body class="has-top-menu">
	<?php else: ?>
	<body class="no-slider has-dat-menu">
	<?php endif; ?>
	
		
		<!-- BEGIN #slider-imgs -->
		<div id="slider-imgs">
			<div class="featured-img-box">
				<div id="featured-img-1" class="featured-img"></div>
				<div id="featured-img-2" class="featured-img invisible"></div>
				<div id="featured-img-3" class="featured-img invisible"></div>
				<div id="featured-img-4" class="featured-img invisible"></div>
			</div>
		</div>
		<!-- END #slider-imgs -->

		<!-- BEGIN #top-layer -->
		<div id="top-layer">
			<div id="header-top">
				<div class="wrapper">
					<ul class="left load-responsive" rel="Fonctionnalités">
						<?php if(!empty($_SESSION['uid'])): ?>
							<li style="background-color: #6fb205;"><a href="?page=message&name=Boîte%20de%20réception">Messagerie</a></li>
						<?php endif; ?>
					</ul>

					<ul class="right load-responsive" rel="Utilisateur">
						<?php if(!empty($_SESSION['uid'])): ?>
							<li><a style="background-color: #DB6D1D;" href="?page=user&view=logout&name=Déconnexion">Déconnexion <i class="fa fa-sign-out" aria-hidden="true"></i> </a></li>
						<?php else: ?>
							<li><a style="background-color: #313131;" href="?page=user&view=login&name=Se%20connecter">Se connecter <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
							<li><a style="background-color: #c22828; margin-left: 1px;" href="?page=user&view=register&name=S%27enregistrer">S'enregistrer <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<section id="content">
				<?php if($_GET['view'] == "profil" | $_GET['view'] == "comment" | $_GET['view'] == "friend" | $_GET['view'] == "profil_edit"): ?>
					<header id="header" class="needsmallpadding">
				<?php else: ?>
					<header id="header">
				<?php endif; ?>
					<div id="menu-bottom">
						<nav id="menu" class="main-menu">
							<div class="blur-before"></div>
							<a href="./" class="header-logo left"><img src="assets/images/logo.png" class="logo" alt="Activ Gaming" title="Accueil" /></a>

							<a href="#dat-menu" class="datmenu-prompt"><i class="fa fa-bars"></i>Menu</a>

							<ul class="load-responsive" rel="Menu principal">
								<?php if (empty($_SESSION['uid'])): ?>
								<li><a href="?page=user&view=register&name=S%27enregistrer"><i class="fa fa-user"></i><strong>Nous rejoindre</strong></a></li>
								<?php else: ?>
									
								<li><a href="?page=user&view=profil&uid=<?php echo $_SESSION['uid']; ?>"><i class="fa fa-gamepad"></i><strong><?php echo $_SESSION['username']; ?></strong></a>
									<ul class="sub-menu">
										<li><a href="?page=user&view=profil&uid=<?php echo $_SESSION['uid']; ?>">Voir mon profil</a></li>
										<li><a href="?page=user&view=profil_edit&uid=<?php echo $_SESSION['uid']; ?>">Modifier mon profil</a/></li>
									</ul>
								</li>
								<?php endif; ?>
								<li><a href="?page=event&name=Tournois"><i class="fa fa-trophy"></i><strong>Tournois</strong></a></li>

								<li><a href="?page=user&view=list&name=Liste%20des%20membres"><span><i class="fa fa-users"></i><strong>Communauté</strong></span></a>
									<ul class="sub-menu">
										<li><a href="?page=user&view=team&name=Notre%20équipe">Notre équipe</a></li>
										<li><a href="?page=user&view=list&name=Liste%20des%20membres">Liste des membres</a/></li>
										<li><a href="?page=vocal&action=teamspeak&name=Teamspeak%203">Teamspeak 3</a/></li>
									</ul>
								</li>

								<li><a href="?page=shop&name=Boutique"><i class="fa fa-shopping-cart"></i><strong>Boutique</strong></a></li>

								<li><a href="?page=support&name=Support"><i class="fa fa-envelope"></i><strong>Support</strong></a></li>
							</ul>
						</nav>
					</div>
					
					<?php if (!empty($_GET['page']) AND $_GET['page'] <> "home" AND $_GET['view'] <> "profil" AND $_GET['view'] <> "comment" AND $_GET['view'] <> "friend" AND $_GET['view'] <> "profil_edit"): ?>
					<div class="wrapper">
						<div class="header-breadcrumbs">
							<h2 class="right"><?php echo $_GET['name']; ?></h2>
							<ul>
								<li><a href="?page=home">Accueil</a></li>
								<li><?php echo $_GET['name']; ?></li>
							</ul>
						</div>
					</div>
					<?php endif; ?>
					
					<div id="slider">
						<div id="slider-info">
							<div class="padding-box">
								<ul>
									<li>
										<h2><a href="#">Présentation</a></h2>
										<p>Coaching, tournois, rencontres IRL, nous n'avons pas le temps de nous ennuyer chez Activ Gaming</p>
									</li>
									<li class="dis">
										<h2><a href="#">Coaching</a></h2>
										<p>Notre staff dispose de plusieurs coachs qui seront propulser nos équipes classées à la victoire.</p>
									</li>
									<li class="dis">
										<h2><a href="?page=event&name=Tournois">Tournois</a></h2>
										<p>Nous organisons régulièrement des évènements en ligne tels que des tournois mais aussi des rencontres IRL.</p>
									</li>
									<li class="dis">
										<h2><a href="vocal&action=teamspeak&name=Teamspeak%203">Teamspeak</a></h2>
										<p>Vous pouvez nous rejoindre sur notre serveur Teamspeak avec vos coéquipiers et même vous faire de nouveaux ami(e)s.</p>
									</li>
								</ul>
							</div>
							<a href="javascript: featSelect(1);" id="featSelect-1" class="featured-select this-active">
								<span class="w-bar" id="feat-countdown-bar-1">.</span>
								<span class="w-coin" id="feat-countdown-1">1</span>
								<img src="assets/images/banners/min_overwatch.jpg" alt="" title="">
							</a>
							<a href="javascript: featSelect(2);" id="featSelect-2" class="featured-select">
								<span class="w-bar" id="feat-countdown-bar-2">.</span>
								<span class="w-coin" id="feat-countdown-2">0</span>
								<img src="assets/images/banners/min_lol.jpg" alt="" title="">
							</a>
							<a href="javascript: featSelect(3);" id="featSelect-3" class="featured-select">
								<span class="w-bar" id="feat-countdown-bar-3">.</span>
								<span class="w-coin" id="feat-countdown-3">0</span>
								<img src="assets/images/banners/min_wow.jpg" alt="" title="">
							</a>
							<a href="javascript: featSelect(4);" id="featSelect-4" class="featured-select">
								<span class="w-bar" id="feat-countdown-bar-4">.</span>
								<span class="w-coin" id="feat-countdown-4">0</span>
								<img src="assets/images/banners/min_minecraft.jpg" alt="" title="">
							</a>
						</div>
					</div>
				</header>