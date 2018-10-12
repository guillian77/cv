<?php

if(!isset($_SESSION['uid'])) {
	echo '<meta http-equiv="refresh" content="0;URL=?page=user&view=login&name=Se%20connecter">';
	return;
}


require 'application/message/models/message.php';

#######################
# LISTER CONVERSATION #
#######################
if (empty($_GET['action']) OR $_GET['action'] == "list") {
	getConversationsList($_SESSION['uid']);
	foreach ($conversations as $conversation) {
		$conversationsCount++;
	}
	getConversationsList($_SESSION['uid']);
	require 'application/message/views/list.php';
	unset($_SESSION['success']['pm']);
}

######################
# CREER CONVERSATION #
######################
if ($_GET['action'] == "create" OR $_GET['action'] == "do_create") {
	$content = $_POST['content'];
	$title = $_POST['title'];
	$for_user = $_POST['for_user'];

	if (isset($_GET['username'])) { $for_user = $_GET['username']; }
	if (isset($_GET['reason'])) { $title = $_GET['reason'];	}

	if(empty($_POST['content'])) { $errors['content'] = "Vous devez entrer du texte."; }
	if(empty($_POST['title'])) { $errors['title'] = "Vous devez spécifier un titre."; }
	if(empty($_POST['for_user'])) { $errors['for_user'] = "Vous devez spécifier un utilisateur cible."; }

	if(empty($errors) AND $_GET['action'] == "do_create") {
		setNewConversation($_SESSION['uid'], $_POST['for_user'], $_POST['title'], $_POST['content']);
		echo '<meta http-equiv="refresh" content="0;URL=?page=message&action=list">';
	}

	require 'application/message/views/create.php';
}

#############################
# AFFICHER UNE CONVERSATION #
#############################
if ($_GET['action'] == "display") {

	$targetUser = getConversationMessages($_GET['cid']);
	$target = $targetUser->fetch();
	if (!empty($_POST['content'])) {
		setMessageToConv($_GET['cid'],$_SESSION['uid'],$target['uid'],$_POST['content']);
		echo '<meta http-equiv="refresh" content="0;URL='.$_SERVER["REQUEST_URI"].'">';
	}

	getConversationMessages($_GET['cid']);
	require 'application/message/views/display.php';
}

?>