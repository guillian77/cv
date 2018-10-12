<?php

// Notifier un compte en attente d'activation

$unregistered_account = $db->query("SELECT * FROM users WHERE usergroup = 2");

foreach($unregistered_account as $unregistered)
{
	$count++;
}

if ($count > 0)
{
	echo'
		<div class="content-padding">
			<a target="_blank" href="forum/admin/index.php?module=user-users&vid=3" class="top-alert-message">
				<span><span class="pod-live">Alerte </span>Il y a '.$count.' compte(s) en attente d\'activation.</span>
			</a>
		</div>
	';
}


// Message d'annonce général

echo'
	<div class="content-padding">
		<a target="_blank" href="?page=user-single&uid='.$mybb->user['uid'].'" class="top-alert-message" style="background-color: #519623;">
			<span><span class="pod-live" style="color: #519623;">Nouveauté </span>Vous pouvez modifier votre liste de jeux en cliquant sur \'Modifier mes jeux\'.</span>
		</a>
	</div>
';

?>