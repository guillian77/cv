<?php

##########
# MODELS #
##########

// Rechercher les jeux de la communauté
function getGameList()
{
	global $db, $game_list;
	$game_list = $db->query('SELECT * FROM gamelibrary_games ORDER BY gid ASC');
}

?>