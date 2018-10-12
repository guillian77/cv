<?php

#########
# MODEL #
#########

# Modification des informations et paramètres de l'utilisateur.
# Ce système nécessite que l'utilisateur soit connecté

function updatePseudo()
{
	global $db, $pseudo_modified;

	$username = htmlspecialchars($_POST['username']);

	$db->query('UPDATE users SET username = "'.$username.'" WHERE uid = "'.$_SESSION['uid'].'"');

	$pseudo_modified = 1;
}

function updateAvatar($uid, $avatar)
{
	global $db, $avatar_modified;

	$db->query('UPDATE users SET avatar = "'.$avatar.'" WHERE uid = '.$uid.'');

	$avatar_modified = 1;
}

function updatePassword()
{
	global $db, $password_modified, $error, $passwordEmpty;

	$password_old = htmlspecialchars($_POST['password_old']);
	$password = htmlspecialchars($_POST['password']);
	$password_confirm = htmlspecialchars($_POST['password_confirm']);

	if(!empty($password_old) AND !empty($password) AND !empty($password_confirm))
	{
		// Vérifier que les mot de passe correspondent
		if($password == $password_confirm)
		{
			// Hasher le mot de passe pour la sécurité
			$password_old = md5($password_old);
			$password_hash = md5($password);

			// Mot de passe différent de l'ancien
			$verifyPassword = $db->query('SELECT password FROM users WHERE uid = "'.$_SESSION['uid'].'"');
			foreach ($verifyPassword as $oldPassword)
			{
				if ($password_hash == $oldPassword['password'])
				{
					$error = "Votre nouveau mot de passe doit être différent de l'ancien.";
				}

				if ($password_old != $oldPassword['password'])
				{
					$error ="L'ancien mot de passe, n'est pas correcte.";
				}

				if(!$error)
				{
					// Enregistrer le nouveau mot de passe
					$db->query('UPDATE users SET password = "'.$password_hash.'" WHERE uid = "'.$_SESSION['uid'].'"');
					$password_modified = 1;
				}
			}
		}
	}
	else
	{
		$error = "Vous devez remplir tous les champs.";
	}
}

function updateEmail()
{
	global $db, $email_modified;

	$email = htmlspecialchars($_POST['email']);
	$email_confirm = htmlspecialchars($_POST['email_confirm']);

	// Vérifier que les email correspondent
	if($email == $email_confirm)
	{
		// Enregistrer l'email dans la base de donnée
		$db->query('UPDATE users SET email = "'.$email.'" WHERE uid = "'.$_SESSION['uid'].'"');

		$email_modified = 1;
	}
}

function updateBiographie()
{
	global $db, $bio_modified;

	$biographie = htmlspecialchars($_POST['biographie']);

	// Vérifier que la biographie n'est pas vide
	if(!empty($biographie))
	{
		$db->query('UPDATE userfields SET biographie = "'.$biographie.'" WHERE ufid = "'.$_SESSION['uid'].'"');
		$bio_modified = 1;
	}
}

function updateSetup($uid, $processor, $ram, $stockage, $gpu, $motherboard, $freefield, $setup_pic_1, $setup_pic_2)
{
	global $db, $setup_modified;


	// Mise à jours des données dans la DB
	$req = $db->prepare('UPDATE userfields SET 
		processor = :processor, ram = :ram, stockage = :stockage, gpu = :gpu, motherboard = :motherboard, freefield = :freefield, setup_pic_1 = :setup_pic_1,  setup_pic_2 = :setup_pic_2 WHERE ufid = '.$uid.'');

	$req->execute(array(
		'processor' => $processor,
		'ram' => $ram,
		'stockage' => $stockage,
		'gpu' => $gpu,
		'motherboard' => $motherboard,
		'freefield' => $freefield,
		'setup_pic_1' => $setup_pic_1,
		'setup_pic_2' => $setup_pic_2
	));

	$setup_modified = 1;
}

function updateComplement($uid,$localisation,$sexe,$birth,$steam,$origin,$uplay,$lolid,$battlenet, $epicgame,$twitch)
{
	global $db, $complement_modified;

	// Mise à jours des données dans la DB
	$req = $db->prepare('UPDATE userfields SET 
		localisation = :localisation,
		sexe = :sexe,
		birth = :birth,
		steam = :steam,
		origin = :origin,
		uplay = :uplay,
		lolid = :lolid,
		battlenet = :battlenet,
		epicgame = :epicgame,
		twitch = :twitch
		WHERE ufid = '.$uid.'');

	$req->execute(array(
		'localisation' => $localisation,
		'sexe' => $sexe,
		'birth' => $birth,
		'steam' => $steam,
		'origin' => $origin,
		'uplay' => $uplay,
		'lolid' => $lolid,
		'battlenet' => $battlenet,
		'epicgame' => $epicgame,
		'twitch' => $twitch
	));

	$complement_modified = 1;


}



?>