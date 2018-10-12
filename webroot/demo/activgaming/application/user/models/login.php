<?php

#########
# MODEL #
#########

// Connexion
function login($username, $password)
{
	global $db, $user, $errors;

	$errors = 0;

	// On vérifie si l'utisateur a renseigné tous les champs requis
	if (!empty($username) AND !empty($password))
	{
		$mdp_crypt = md5($password);

		$users = $db->query('SELECT * FROM users LEFT JOIN usergroups ON users.usergroup = usergroups.gid LEFT JOIN userfields ON users.uid = userfields.ufid WHERE password = "'.$mdp_crypt.'" AND username = "'.$username.'"');

		while ($user = $users->fetch(PDO::FETCH_ASSOC))
		{
			$_SESSION['uid'] = $user['uid'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['avatar'] = $user['avatar'];
			$_SESSION['usergroup'] = $user['usergroup'];
			$_SESSION['additionalgroups'] = $user['additionalgroups'];
			$_SESSION['displaygroup'] = $user['displaygroup'];
			$_SESSION['usertitle'] = $user['usertitle'];
			$_SESSION['regdate'] = $user['regdate'];
			$_SESSION['lastactive'] = $user['lastactive'];
			$_SESSION['lastvisit'] = $user['lastvisit'];
			$_SESSION['lastpost'] = $user['lastpost'];
			$_SESSION['website'] = $user['website'];
			$_SESSION['biographie'] = $user['biographie'];

			/**
			* Autoriser accès administrateur
			*/
			if ($user['power'] >= 50) {
				$_SESSION['is_admin'] = $user['power'];
			}
		}

		/**
		* Vérification bon mot de passe pour l'erreur
		*/
		if ($mdp_crypt != $user['uid']) {
			$errors = "Le mot de passe ne correspond pas !";
		}

		// Actualiser la dernière date de connexion de l'utilisateur
		if ($_SESSION['uid'])
		{
			$timestamp = time();
			$db->query('UPDATE users SET lastactive = "'.$timestamp.'" WHERE uid = "'.$_SESSION['uid'].'"');
		}
	}
	else
	{
		// Champs manquant
		$errors = "Veuillez renseigner tous les champs !";
	}
}

?>