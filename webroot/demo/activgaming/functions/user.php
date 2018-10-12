<?php

/**
* RECUPERER INFOS UTILISATEUR
*/
function getUsersInfos($uid, $type)
{
	global $db, $users;

	/**
	* SELECTIONNER UN UTILISATEUR [$uid]
	* $uid ID utilisateur
	* Tables users, usergroups, userfields
	*/
	if ($uid)
	{
		$users = $db->query('SELECT * FROM users LEFT JOIN usergroups ON users.usergroup = usergroups.gid LEFT JOIN userfields ON users.uid = userfields.ufid WHERE uid = '.$uid.'');
	}
	else

	/**
	* SELECTIONNER TOUS LES UTILISATEURS
	*/
	{
		$users = $db->query('SELECT * FROM users LEFT JOIN usergroups ON users.usergroup = usergroups.gid LEFT JOIN userfields ON users.uid = userfields.ufid');
	}

	/**
	* SELECTIONNER UTILISATEUR DU STAFF
	*/
	if ($type == "staff")
	{
		$users = $db->query('SELECT * FROM users LEFT JOIN usergroups ON users.usergroup = usergroups.gid LEFT JOIN userfields ON users.uid = userfields.ufid WHERE power >= 50');
	}


	return $users;
}

/**
 * Récupérer la véritable IP visiteur
 */
function get_ip()
{
	// IP si internet partagé
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$client_ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	// IP derrière un proxy
	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	// Sinon : IP normale
	else {
		$client_ip = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}

	return $client_ip;
}

/**
* Enregistrer IP visiteur lors d'une visite
*/
function set_client_ip($visiter_ip)
{
	global $db;
	
	$stmt = $db->prepare("INSERT INTO sessions (s_ip, s_date, s_agent) VALUES (:ip, :time, :agent)");
    $stmt->bindParam(':ip', $visiter_ip);
    $stmt->bindParam(':time', time());
    $stmt->bindParam(':agent', $_SERVER['HTTP_USER_AGENT']);
    $stmt->execute();

    // var_dump($_SERVER['HTTP_USER_AGENT']);
}

function getOnlineSessions()
{
	global $db;

	$time = time();
	// Moins deux heures
    $minusTime = $time - (2 * 60 * 60); // Jour * Heures * Minutes * Secondes

    $ip = $db->query('SELECT DISTINCT * FROM sessions WHERE s_date>"'.$minusTime.'"');
	foreach ($ip as $value)
	{
		echo $value['s_ip'].'<br/>';
	}
}

function updateCommentCount($uid)
{
	global $db, $users;

	// Récupérer nombre de commentaires depuis utilisateur
	getUsersInfos($uid, "");
	$user = $users->fetch();

	//Incrémenter de 1 le nombre de commentaire
	$commentcount = $user['comments'];
	$commentcount++;

	// Mettre à jours dans la BDD
	$db->query('UPDATE users SET comments = '.$commentcount.' WHERE uid = '.$uid.'');
	// echo $user['comments'];
}

/**
* Cette fonction permet de créer une entrée dans la table userfields si elle n'existe pas
* @param $uid ID de l'utilisateur
*/
function createUserfields($uid)
{
	global $db;

	// Créer une entrée dans la DB usefields si non existante
	$exist = $db->query('SELECT ufid FROM userfields WHERE ufid = '.$uid.'');
	$match = $exist->fetch();

	if ($match == FALSE) { $db->query('INSERT INTO userfields (ufid) VALUES ('.$uid.')'); }
}

?>