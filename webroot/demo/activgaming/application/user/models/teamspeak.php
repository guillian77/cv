<?php

/**
* TEAMSPEAK 3 MODEL
* @author 		Dekadmin
* @copyright 	Activ Gaming
*/

/**
* getTS3Client
*
* @var client_ip IP de l'utilisateur
*
* Récupère les données stockées dans la DB ts3 d'un utilisateur en fonction de son adresse IP.
*/
function getTS3Client($client_ip)
{
	global $dbts3, $clients;

	$clients = $dbts3->query('SELECT * FROM clients LEFT JOIN group_server_to_client ON clients.client_id = group_server_to_client.id1 WHERE 
		client_lastip = "'.$client_ip.'" ORDER BY client_lastconnected DESC LIMIT 1');

	return $clients;
}

?>