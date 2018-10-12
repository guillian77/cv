<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

/**
* REQUIRES
*/
require_once'config/requires.php';

/**
* Afficher le template
*/
require_once'assets/requires/header.php'; // appel de l'en-tête

$filename = 'application/'.$_GET['page'].'';

if (isset($_GET['page']) AND !empty($_GET['page']) AND file_exists($filename))
{
	require_once 'application/'.$_GET['page'].'/controllers/'.$_GET['page'].'.php';
}
else if (!isset($_GET['page']))
{
	require_once'application/home/controllers/home.php';
}
else {
	require_once'assets/requires/404.php';
}

require_once'assets/requires/footer.php'; // appel du pied de page

/**
* Récupérer adresse IP client et l'enregistrer (DB: sessions)
*/
set_client_ip(get_ip());

?>