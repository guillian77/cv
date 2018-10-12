<?php

/**
* WEBSITE SETTINGS
*/

class Conf {
	static $settings = array(
	/** ======
	* GENERAL
	*/
	'version' => "1.2.2",
	'debug' => 1,

	/** ======
	* NETWORKS
	*/
	'network' => array(
		'twitch' => "https://player.twitch.tv/?channel=activgamingtv",
		'facebook' => "https://www.facebook.com/guillian.desousa",
		'steam' => "https://player.twitch.tv/?channel=activgamingtv",
		'youtube' => "https://www.youtube.com/channel/UCqXeSgfYewvKp1QrCuDmlHQ",
		'teamspeak' => "ts.activ-gaming.com",
		'git' => "https://github.com/guillian77",
		'mail' => "guillian77270@gmail.com"
	),

	/** ======
	* REFERENCEMENT
	*/
	'keywords' => array(
		'url' => 'guillian-aufrere.fr',
		'title' => 'CV développeur web',
		'description' => "Curriculum Vitae de Guillian Aufrère, développeur web en formation",
		'keywords' => "développeur web, HTML5, CSS3, PHP, bootstrap, laravel, symphonie, SASS, compass, composer, linux, serveur"
	),

	/** ======
	* DATABASE SETTINGS
	*/
	'db' => array(
		'host' => "activ-gaming.com",
		'user' => "guillian",
		'password' => "AR86g4LOQaKL4DVU",
		'table' => "activ-gaming"
	),

	'tsdb' => array(
		'host' => "activ-gaming.com",
		'user' => "guillian",
		'password' => "AR86g4LOQaKL4DVU",
		'table' => "ts32"
	),

	/** ======
	* TEAMSPEAK SERVER QUERY
	*/
	'tsquery' => array(
		'host' => "activ-gaming.com",
		'user' => "serveradmin",
		'password' => "hp8OVgsz",
		'serverport' => "9987",
		'queryport' => "10011"
	)
	);
}