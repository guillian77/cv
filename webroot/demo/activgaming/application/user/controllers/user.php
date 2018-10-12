<?php

##############
# CONTROLLER #
##############

## A FAIRE
## Programmation en "case"

##########
# LOGOUT #
##########
if ($_GET['view'] == "logout")
{
	session_destroy();

	// Rediriger vers la page d'accueil
	echo '<meta http-equiv="refresh" content="2;URL=?page=home">';
	include'application/user/views/logout.php';
}

#############
# CONNEXION #
#############

if ($_GET['action'] == "do_login")
{
	// Filter special tags
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	require_once'application/user/models/login.php';

	login($username, $password);

	// Si connecté -> Renvoyer vers profil
	if (!empty($_SESSION['uid']))
	{
		// Afficher la page "Succès connection"
		require_once'application/user/views/welcome.php';

		// Vérifier la présence de l'entrée dans la table userfields en fonction de l'uid
		createUserfields($_SESSION['uid']);

		// Rediriger vers l'édition de profil
		echo '<meta http-equiv="refresh" content="2;URL=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'">';

		require_once'application/user/models/teamspeak.php';

		// Ajouter automatiquement le groupe "membre(7)" sur TS
		getTS3Client(get_ip());
		$client = $clients->fetch();

		// Vérifier que l'utilisateur n'a pas déjà un groupe sur TS
		if (empty($client['group_id']))
		{
			$ts3->serverGroupClientAdd(7,$client['client_id']);
		}
	}
}

// Si la vue = login ET utilisateur != connecté
if ($_GET['view'] == "login" AND empty($_SESSION['uid']))
{
	include'application/user/views/login.php';
}

####################
## ENREGISTREMENT ##
####################

if ($_GET['action'] == "do_register")
{
	// Filter special tags
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$confrim_email = htmlspecialchars($_POST['confrim_email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['confirm_password']);

	require_once'application/user/models/register.php';

	registerUser($username, $email, $confrim_email, $password, $confirm_password);
	
	// Si enregistrement OK -> Renvoyer vers page infos
	if (!$errors AND empty($registered))
	{
		// Ajouter automatiquement le groupe "membre(7)" sur TS
		require_once'application/user/models/teamspeak.php';
		getTS3Client(get_ip());
		$client = $clients->fetch();

		// Vérifier que l'utilisateur n'a pas déjà un groupe sur TS
		if (empty($client['group_id']))
		{
			$ts3->serverGroupClientAdd(7,$client['client_id']);
		}
		
		require_once'application/user/views/infos.php';
		return;
	}
}

if ($_GET['view'] == "register")
{
	include'application/user/views/register.php';
}

######################
# MOT DE PASSE PERDU #
######################
if ($_GET['view'] == "password_forgotten")
{
	require_once'application/user/models/password_forgotten.php';
	passwordForgotten();
	include'application/user/views/password_forgotten.php';
}

#########################
# MODIFIER MOT DE PASSE #
#########################
if ($_GET['view'] == "password_modify")
{
	## require_once'application/user/models/password_modify.php';
	## passwordModify();
	include'application/user/views/password_modify.php';
}

############
#   TEAM   #
############
if ($_GET['view'] == "team")
{
	getUsersInfos("", "staff");
	include'application/user/views/team.php';
}

############
#   LIST   #
############
if ($_GET['view'] == "list")
{
	getUsersInfos();
	include'application/user/views/list.php';
}

################
##   PROFIL   ##
################
if ($_GET['view'] == "profil")
{
	// Escape from special strings
	$pid = strip_tags($_GET['uid']);
	$comment = strip_tags($_POST['comment']);

	getUsersInfos($pid);

	/**
	* Recherche des commentaires
	* @var pid 	Profil ID: ID du profil d'utilisateur en visionnage 
	*/
	getComment($pid, 2);
	getNbrComment($pid, 2);

	/**
	* Ajouter un commentaire
	*/
	if (!empty($comment))
	{
		setComment($pid, 2, $comment, $_SESSION['uid']);
		updateCommentCount($_SESSION['uid']);
		echo '<meta http-equiv="refresh" content="0; url='.$_SERVER['HTTP_REFERER'].'#commentaire" />';
	}

	/**
	* Recherche de la liste des jeux
	*/
	require_once'application/user/models/game.php';
	getUserGamelist($_GET['uid']);

	include'application/user/views/profil.php';
}

####################
## EDITION PROFIL ##
####################

# Modification des informations et paramètres d'un utilisateur
# L'utilisateur doit être connecté.

if ($_GET['view'] == "profil_edit" AND !empty($_SESSION['uid']))
{
	getUsersInfos($_SESSION['uid']);
	getGames("", $_SESSION['uid']);

	// Mettre à jour l'avatar
	if($_GET['action'] == "update_avatar")
	{
		$avatar = strip_tags($_POST['avatar']);

		if (empty($avatar)) { $error_avatar = "Vous devez spécifier une URL."; }

		require_once'application/user/models/profil_edit.php';

		if (!$error_avatar)
		{
			updateAvatar($_SESSION['uid'], $avatar);
			echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'" />';
		}
	}

	// Mettre à jour le mot de passe
	if($_GET['action'] == "update_password")
	{
		require_once'application/user/models/profil_edit.php';
		updatePassword();
		echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'" />';
	}

	// Mettre à jour l'email
	if($_GET['action'] == "update_email")
	{
		require_once'application/user/models/profil_edit.php';
		updateEmail();
		echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'" />';
	}

	// Mettre à jour la biographie
	if($_GET['action'] == "update_biographie")
	{
		require_once'application/user/models/profil_edit.php';
		updateBiographie();
		echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'" />';
	}

	// Mettre à jour le setup
	if($_GET['action'] == "update_setup")
	{
		// Strip special chars
		$processor = substr(strip_tags($_POST['processor']), 0 ,28);
		$ram = substr(strip_tags($_POST['ram']), 0 ,28);
		$stockage = substr(strip_tags($_POST['stockage']), 0 ,28);
		$gpu = substr(strip_tags($_POST['gpu']), 0 ,28);
		$motherboard = substr(strip_tags($_POST['motherboard']), 0 ,28);
		$freefield = strip_tags($_POST['freefield']);
		$setup_pic_1 = strip_tags($_POST['setup_pic_1']);
		$setup_pic_2 = strip_tags($_POST['setup_pic_2']);

		require_once'application/user/models/profil_edit.php';

		updateSetup($_SESSION['uid'], $processor, $ram, $stockage, $gpu, $motherboard, $freefield, $setup_pic_1, $setup_pic_2);

		if ($setup_modified) { echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'" />'; }
	}

	// Mettre à jour infos complémentaires
	if ($_GET['action'] == "update_complement")
	{
		// Strip special chars
		$localisation = strip_tags($_POST['localisation']);
		$sexe = strip_tags($_POST['sexe']);
		$birth = strtotime(strip_tags($_POST['birth']));
		$steam = strip_tags($_POST['steam']);
		$origin = strip_tags($_POST['origin']);
		$uplay = strip_tags($_POST['uplay']);
		$lolid = strip_tags($_POST['lolid']);
		$battlenet = strip_tags($_POST['battlenet']);
		$twitch = strip_tags($_POST['twitch']);
		$epicgame = strip_tags($_POST['epicgame']);

		require_once'application/user/models/profil_edit.php';

		updateComplement($_SESSION['uid'],$localisation,$sexe,$birth,$steam,$origin,$uplay,$lolid,$battlenet, $epicgame,$twitch);


		if ($complement_modified) { echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'#complement" />'; }
		
	}

	// Mettre à jour les jeux
	if ($_GET['action'] == "update_game")
	{
		require_once'application/user/models/profil_edit.php';

		setGames($_SESSION['uid'], $_POST['game_list']);

		if ($games_modified) { echo '<meta http-equiv="refresh" content="0; url=?page=user&view=profil_edit&uid='.$_SESSION['uid'].'#jeux" />'; }
	}

	// Afficher la page d'édition du profil
	include'application/user/views/profil_edit.php';
}

?>