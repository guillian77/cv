<?php

##########
# MODELS #
##########

// Rechercher les utilisateurs en ligne

function getUsersOnline($since_time)
{
	global $db, $user;
	
	$MinutesMinus = gmmktime(date("H"), date("i") - $since_time, date("s"), date("m") , date("d"), date("Y"));
	
	// Rechercher les sessions en fonction de $since_time	
	$get_online_users = $db->query('
	SELECT s.sid, s.ip, s.uid, s.time, s.location, u.username, u.invisible, u.usergroup, u.displaygroup
	FROM sessions s
	LEFT JOIN users u ON (s.uid=u.uid)
	WHERE s.time>".$MinutesMinus." AND s.uid != 0
	ORDER BY u.username ASC, s.time DESC
	');
	while ($online_users = $get_online_users->fetch(PDO::FETCH_ASSOC))
	{
		$user['online'] = $online_users;

		// Rechercher les informations sur les utilisateurs
		$get_user_infos = $db->query('SELECT * FROM users WHERE uid = "'.$user['online']['uid'].'"');
		while ($user_infos = $get_user_infos->fetch(PDO::FETCH_ASSOC))
		{
			$user['infos'] = $user_infos;

			// Rechercher les informations de GROUPE sur les utilisateurs
			$get_user_group = $db->query('SELECT * FROM usergroups WHERE gid = "'.$user['infos']['usergroup'].'" LIMIT 8');
			while ($user_group = $get_user_group->fetch(PDO::FETCH_ASSOC))
			{
				$user['group'] = $user_group;
			}
		}
	}
}

?>