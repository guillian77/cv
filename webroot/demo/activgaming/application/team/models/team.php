<?php

function getTeams() {
	global $db, $teams;

	$req = "SELECT * FROM teams";
	$teams = $db->query($req);
	return $teams;
}

function getTeamInfos($tid) {
	global $db, $tinfos;

	$req = 'SELECT * FROM teams';
	$req .= ' LEFT JOIN teammembers ON teammembers.teamid = teams.tid';
	$req .= ' WHERE tid = '.$tid.' LIMIT 1';

	$tinfos = $db->query($req);
	return $tinfos;
}

function getTeamUsers($tid) {
	global $db, $teamusers;

	$req = 'SELECT * FROM teammembers';
	$req .= ' LEFT JOIN users ON users.uid = teammembers.uid';
	$req .= ' WHERE teamid = '.$tid.' LIMIT 6';

	$teamusers = $db->query($req);
	return $teamusers;
}

function createTeam($tname, $tpresentation, $timage, $online_history, $offline_history, $recrutement) {
	global $db, $created, $teamid;

	$stmt = $db->prepare("INSERT INTO teams (tname, tpresentation, timage, online_history, offline_history, recrutement) VALUES 
		(:tname, :tpresentation, :timage, :online_history, :offline_history, :recrutement)");
	$stmt->bindParam(':tname', $tname);
	$stmt->bindParam(':tpresentation', $tpresentation);
	$stmt->bindParam(':timage', $timage);
	$stmt->bindParam(':online_history', $online_history);
	$stmt->bindParam(':offline_history', $offline_history);
	$stmt->bindParam(':recrutement', $recrutement);

	if($stmt->execute() == TRUE) { $created = 1; }

	$teamid = $db->lastInsertId();
}

?>