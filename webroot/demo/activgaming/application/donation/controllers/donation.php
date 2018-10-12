<?php


/**
* CONTROLLER: DON
* Système permettant à un utilisateur de faire un don à la communauté.
*/

/**
* Page de remerciement
*/
if ($_GET['action'] == "success")
{
	require'application/donation/views/success.php';
}

/**
* Page d'accueil des dons
*/
if (empty($_GET['action']))
{
	require'application/donation/views/home.php';
}


?>