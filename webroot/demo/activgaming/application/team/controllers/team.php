<?php

require'application/team/models/team.php';

switch ($_GET['view']) {
	case "teamlist":
		getTeams();
		require'application/team/views/teamlist.php';
		break;

	case "teampage":
		$tid = strip_tags($_GET['tid']);
		getTeamInfos($tid);
		$tinfo = $tinfos->fetch();
		getTeamUsers($tid);
		require'application/team/views/teampage.php';
		break;

	case "create":
		require'application/team/views/create.php';
		break;

	case "do_create":
		if(!empty($_SESSION['uid'])) { header('Location: ?page=user&view=login&name=Se%20connecter'); } // Should be logged
		if (empty($_POST['name'])) { $errors['name'] = "Vous devez donner un nom à votre équipe."; }
		if (empty($_POST['logo'])) { $errors['logo'] = "Vous devez spécifier un logo pour votre équipe."; }
		if (empty($_POST['description'])) { $errors['description'] = "Vous devez donner une description à votre équipe."; }
		if (empty($_POST['recrutement'])) { $errors['recrutement'] = "Vous devez donner un status de recrutement à votre équipe."; }

		if(empty($errors)) {
			$tname = strip_tags($_POST['name']);
			$timage = strip_tags($_POST['logo']);
			$tpresentation = strip_tags($_POST['description']);
			$online_history = strip_tags($_POST['online']);
			$offline_history = strip_tags($_POST['offline']);
			$recrutement = strip_tags($_POST['recrutement']);

			createTeam($tname, $tpresentation, $timage, $online_history, $offline_history, $recrutement);
			getTeamInfos($teamid);
			$tinfo = $tinfos->fetch();

			if ($created == 1) { echo '<META http-equiv="refresh" content="0; URL=?page=team&view=teampage&tid='.$teamid.'&name='.$tinfo['tname'].'">'; }
		}

		require'application/team/views/create.php';
		break;
	
	default:
		getTeams();
		require'application/team/views/teamlist.php';
		break;
}

?>