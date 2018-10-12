<?php

/**
* Rechercher les coatchs
*/
function getCoatchsList($coatchsGroups) {
	global $db, $coatchs;

	$req = 'SELECT * FROM users';
	$req .= ' LEFT JOIN usergroups ON usergroups.gid = users.usergroup';
	$req .= ' LEFT JOIN userfields ON userfields.ufid = users.uid';
	$req .= " WHERE usergroup IN (".implode(',', $coatchsGroups)." )";

	return $coatchs = $db->query($req);
}


?>