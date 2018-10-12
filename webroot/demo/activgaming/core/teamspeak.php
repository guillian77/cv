<?php
/**
* Teamspeak
* Connect to teamspeak server query
*
* ts3 	Represent teamspeak 3 server connexion object
*/

// Include teamspeak API libraries
require_once($conf['path']['teamspeak']."libraries/TeamSpeak3/TeamSpeak3.php");
TeamSpeak3::init();
header('Content-Type: text/html; charset=utf8');

// Init values
$status = "Hors ligne";
$tsonlinecount = 0;
$max = 0;

// Connect to teamspeak 3 server query
try {
	$ts3 = TeamSpeak3::factory("serverquery://".$conf['query_ts']['user'].":".$conf['query_ts']['password']."@".$conf['query_ts']['host'].":".$conf['query_ts']['port_query']."/?server_port=".$conf['query_ts']['port']."&use_offline_as_virtual=1&no_query_clients=1");
	$status = $ts3->getProperty("virtualserver_status");
	$tsonlinecount = $ts3->getProperty("virtualserver_clientsonline") - $ts3->getProperty("virtualserver_queryclientsonline");
	$max = $ts3->getProperty("virtualserver_maxclients");
}
catch (Exception $e)
{
	if ($conf['web']['debug'] == 1) {
		echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
	}
}

// Convert english values in french
if ($status == "online") { $status = "En ligne"; }
if ($tsonlinecount < 10) { $tsonlinecount = 0 . $tsonlinecount; }