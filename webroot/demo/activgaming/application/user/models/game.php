<?php

/**
* MODEL JEU: USER
*
* @author Dekadmin
* @copyright Activ Gaming
*
*/

/**
* LISTE DES JEUX UTILISATEUR
*
* @param int uid ID de l'utilisateur
* @var string games Tableau contenant les infos des jeux d'un utilisateur
*/
function getUserGamelist($uid)
{
	global $db, $games;

	$games = $db->query('SELECT * FROM gamelibrary_ownedgames LEFT JOIN gamelibrary_games ON gamelibrary_ownedgames.o_gid = gamelibrary_games.g_gid WHERE active = 1 AND uid = '.$uid.'');

	return $games;
}

?>