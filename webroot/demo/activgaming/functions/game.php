<?php

function getGames($limit, $uid)
{
	global $db, $games;

	// Sans limite
	if (empty($limit)) { $games = $db->query('SELECT * FROM gamelibrary_games LEFT JOIN gamelibrary_ownedgames ON gamelibrary_games.g_gid = gamelibrary_ownedgames.o_gid'); }

	// Avec une limite
	else { $games = $db->query('SELECT * FROM gamelibrary_games LIMIT '.$limit.''); }

	// Sans limite
	if (!empty($uid)) { $games = $db->query('SELECT * FROM gamelibrary_games LEFT JOIN gamelibrary_ownedgames ON gamelibrary_games.g_gid = gamelibrary_ownedgames.o_gid WHERE uid = '.$uid.''); }

	return $games;
}

function getUserGamecount($uid)
{
	global $db;

	$games = $db->query('SELECT * FROM gamelibrary_ownedgames LEFT JOIN gamelibrary_games ON gamelibrary_ownedgames.o_gid = gamelibrary_games.g_gid WHERE active = 1 AND uid = '.$uid.'');

	$count = 0;

	foreach ($games as $value) { $count++; }

	return $count;
}

function setGames($uid, $game_list = array())
{
	global $db, $games, $games_modified;

	// On ajoute automatiquement les jeu en "active" = 0
	getGames();
	foreach ($games as $game)
	{
		$exist = $db->query('SELECT * FROM gamelibrary_ownedgames WHERE uid = '.$uid.' AND gid = '.$game['gid'].'');
		$match = $exist->fetch();

		if ($match == FALSE)
		{
			$db->query('INSERT INTO gamelibrary_ownedgames (uid, gid, active) VALUES ('.$uid.','.$game['gid'].',0)');
		}
		
	}

	$db->query('UPDATE gamelibrary_ownedgames SET active = 0 WHERE active = 1');

	if(!empty($game_list))
	{
		foreach($game_list as $gid)
		{
		        $db->query('UPDATE gamelibrary_ownedgames SET active = 1 WHERE gid = '.$gid.'');
		}
	}

	$games_modified = 1;

	
}

?>