<?php

date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra');

if (!empty($_GET['name']))
{
	$page = strip_tags($_GET['name'])." - ";
}

$conf = array(
	/**
	* GENERAL
	*/
	'web' => array(
		'page' => $page,
		'title' => $page.'Activ Gaming - Multigaming, Coaching, Tournois, Equipes classées ...',
		'description' => "Communauté multigaming Francophone depuis 2016. Laisse ta vie sociale de côté et viens passer des heures de folie chez nous. Parce que içi tu te sens comme à la maison. C'est la communauté multigaming PC francophone du moment !",
		'keywords' => "Multigaming, Teamspeak, Coach, Trounoi, League of Legends, Overwatch, Fortnite, CS: GO, Minecraft",
		'version' => "1.1.5",
		'debug' => 1
	),

	/**
	* PATH
	*/
	'path' => array(
		'upload' => "uploads/",
		'teamspeak' => "core/libraries/teamspeak/"
	),

	/**
	* LIMIT
	*/
	'limit' => array(
		'article' => 2,
		'event' => 2,
		'twitter' => 4
	),

	/**
	* DATABASE AND OTHER
	* Paramètres de connexion
	*/
	'db_site' => array(
		'host' => "activ-gaming.com",
		'user' => "guillian",
		'password' => "fTMzs395",
		'table' => "activ-gaming"
	),

	'db_ts' => array(
		'host' => "activ-gaming.com",
		'user' => "guillian",
		'password' => "fTMzs395",
		'table' => "ts32"
	),

	'query_ts' => array(
		'host' => "activ-gaming.com",
		'user' => "serveradmin",
		'password' => "f9kPTfLc",
		'port' => "9987",
		'port_query' => "10011"
	)
);

?>
