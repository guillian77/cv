<?php

##############
# CONTROLLER #
##############

// Inclure les modèles, transactions avec la BDD



// Afficher la page demander à l'utilisateur

if ($_GET['action'] == "teamspeak")
{
	include'application/vocal/views/teamspeak.php';
}
if ($_GET['action'] == "discord")
{
	include'application/vocal/views/discord.php';
}
// Si aucune action spécifié: discord
if (empty($_GET['action']) OR !isset($_GET['action']))
{
	include'application/vocal/views/discord.php';
}

?>