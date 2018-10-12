<?php

##############
# CONTROLLER #
##############

// include'functions/event.php';
include'functions/calendar.php';

/********************
* AFFICHER TEMPLATE *
/********************/

if ($_GET['page'] == "calendar")
{
	// Charger la liste des events
	getEvent();

	# Appeler calendar class pour afficher le calendrier
	$calendar = New Calendar();
	include'application/calendar/views/calendar.php';
}

?>