<?php

#########
# MODEL #
#########

function registerUser($username, $email, $confrim_email, $password, $confirm_password)
{
	global $db, $registered, $errors;

	$md5_password = md5($password);

	// Vérifier que l'utilisateur a remplit les champs requis
	if (!empty($username) AND !empty($email) AND !empty($confrim_email) AND !empty($password) AND !empty($confirm_password))
	{
		// Vérifier que les deux mail soient les mêmes
		if ($email == $confrim_email)
		{
			// Vérifier que les deux mot de passe soient les mêmes
			if ($password == $confirm_password)
			{
				// Vérifier que le nom d'utilisateur ou mail ne soit pas déjà pris
				$users = $db->query('SELECT * FROM users WHERE username = "'.$username.'" OR email ="'.$email.'"');

				$alreadyexist=0;
				while ($user = $users->fetch(PDO::FETCH_ASSOC))
				{
					$alreadyexist = 1;
					$errors = "Le nom de compte est déjà pris.";
				}

				// Si le compte n'est pas déjà existant
				if (!$alreadyexist)
				{
					$regdate = time();
					
					// On prépare la requête SQL et les paramètres
					$stmt = $db->prepare("INSERT INTO users (username, password, email, regdate) 
					VALUES (:username, :password, :email, :regdate)");
					$stmt->bindParam(':username', $username);
					$stmt->bindParam(':password', $md5_password);
					$stmt->bindParam(':email', $email);
					$stmt->bindParam(':regdate', $regdate);
					
					// Insertion des données préparées
					$stmt->execute();
					
					// Mettre la variable de validation d'enregistrement à 1
					$registered = 1;
				}
			}
			else
			{
				$errors = "Les mots de passes ne correspondent pas.";
			}
		}
		else
		{
			$errors = "Les emails ne correspondent pas.";
		}
	}
	else
	{
		$errors = "Veuillez renseigner tous les champs.";
	}
}

?>