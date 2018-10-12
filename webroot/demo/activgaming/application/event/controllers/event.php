<?php

##############
# CONTROLLER #
##############

###############
# CREER EVENT #
###############
if ($_GET['view'] == "create" AND isset($_SESSION['is_admin']))
{
	if ($_GET['action'] == "do_create")
	{
		$error = NULL;

		// don't strtotime for display again on mistake
		$undate = strip_tags($_POST['date']);
		$untime = strip_tags($_POST['time']);

		// Strip special string like HTML code
		$title = strip_tags($_POST['title']);
		$date = strtotime(strip_tags($_POST['date']));
		$time = strtotime(strip_tags($_POST['time']));
		$text = skipScript($_POST['text']);
		$banner = strip_tags($_POST['banner']);
		$location = strip_tags($_POST['location']);
		$active = strip_tags($_POST['active']);

		// Vérifier que les champs soient remplient
		if (empty($title)) { $error = "Vous devez spécifier un titre."; }
		if (empty($date)) { $error = "Vous devez spécifier une date."; }
		if (empty($time)) { $error = "Vous devez spécifier une heure de départ."; }
		if (empty($text)) { $error = "Vous devez remplir votre zone de text."; }
		if (empty($banner)) { $error = "Vous devez spécifier une bannière."; }
		if (empty($location)) { $error = "Vous devez spécifier un lieu."; }
		if (empty($active)) { $error = "Vous devez indiquer le status de l'event."; }

		// Si pas d'erreurs -> Enregistrer
		if (!$error)
		{
			require_once'application/event/models/event.php';
			setEvent($title, $date, $time, $text, $banner, $location, $active);
		}
	}

	require_once'application/event/views/create.php';
}

################
# EDITER EVENT #
################
if ($_GET['view'] == "edit" AND isset($_SESSION['is_admin']))
{
	// Récupérer infos event
	getEvent($_GET['eid']);

	if (!empty($_GET['action']) == "do_edit")
	{
		$error = NULL;
		
		// Strip special string like HTML code
		$eid = strip_tags($_GET['eid']);
		$title = strip_tags($_POST['title']);
		$date = strtotime(strip_tags($_POST['date']));
		$time = strtotime(strip_tags($_POST['time']));
		$text = skipScript($_POST['text']);
		$banner = strip_tags($_POST['banner']);
		$location = strip_tags($_POST['location']);
		$active = strip_tags($_POST['active']);

		// Vérifier que les champs soient remplient
		if (empty($title)) { $error = "Vous devez spécifier un titre."; }
		if (empty($date)) { $error = "Vous devez spécifier une date."; }
		if (empty($time)) { $error = "Vous devez spécifier une heure de départ."; }
		if (empty($text)) { $error = "Vous devez remplir votre zone de text."; }
		if (empty($banner)) { $error = "Vous devez spécifier une bannière."; }
		if (empty($location)) { $error = "Vous devez spécifier un lieu."; }
		if (empty($active)) { $error = "Vous devez indiquer le status de l'event."; }

		var_dump($eid);

		// Si pas d'erreurs -> Mettre à jour
		if (!$error)
		{
			require_once'application/event/models/event.php';
			updateEvent($eid, $title, $date, $time, $text, $banner, $location, $active);
		}

		if ($updated) { echo '<meta http-equiv="refresh" content="0; url=?page=event&view=edit&eid='.$eid.'" />'; }
	}

	require_once'application/event/views/edit.php';
}

##################
# AFFICHER EVENT #
##################
if ($_GET['view'] == "display")
{
	// Strip special string like HTML code
	$eid = strip_tags($_GET['eid']);
	$comment = strip_tags($_POST['comment']);

	getEvent($eid);
	getComment($eid, 3);
	getNbrComment($eid, 3);

	/**
	* Ajouter un commentaire
	*/
	if (!empty($comment))
	{
		setComment($eid, 3, $comment, $_SESSION['uid']);
		updateCommentCount($_SESSION['uid']);
		echo '<meta http-equiv="refresh" content="0; url='.$_SERVER['HTTP_REFERER'].'#commentaire" />';
	}

	/**
	* Afficher la vue
	*/
	require_once'application/event/views/event.php';
}

###################
# SUPPRIMER EVENT #
###################
if ($_GET['action'] == "delete" AND !empty($_SESSION['is_admin']))
{
	// Strip special string like HTML code
	$eid = strip_tags($_GET['eid']);

	require_once'application/event/models/event.php';

	if (!empty($eid)) { deleteEvent($eid); }

	if (!empty($deleted))
	{
		echo '<meta http-equiv="refresh" content="0; url=?page=event&name=Évènements%20à%20venir" />';
	}
}

##############
# LIST EVENT #
##############

if (empty($_GET['view']))
{
	if($_GET['action'] == "get-hidden" AND $_SESSION['is_admin']) { getHideEvent(); }
	else { getEvent(); }
	
	require_once'application/event/views/list.php';
}

?>