<?php

#########
# MODEL #
#########

# Reinitialisation du mot de passe
# Ce système nécessite la confirmation d'un "nom d'utilisateur" ET d'une "adresse mail"

function passwordForgotten()
{
	global $db, $user, $password_changed;

	$username = htmlspecialchars($_POST['username']);
	$mail = htmlspecialchars($_POST['email']);

	// On vérifie si l'utisateur a renseigné tous les champs requis
	if (isset($_POST['username']) AND isset($_POST['email']))
	{
		// On vérifie le nom d'utilisateur et le mail correspond
		$users = $db->query('SELECT * FROM users WHERE email = "'.$mail.'" AND username = "'.$username.'"');

		while ($user = $users->fetch(PDO::FETCH_ASSOC))
		{
			// Générer un mot de passe aléatoire
			$nbCaractere = 7;
			$password = "";
			for($i = 0; $i <= $nbCaractere; $i++)
			{
				$random = rand(97,122);
				$password .= chr($random);
			}

			$toname = $username;
			$to = $mail;
			$fromname = "Activ Gaming";
			$from = "no-reply";
			$subject = "Mot de passe oublié";

			$body = '
			<p>Bonjour '.$username.'</p>
			<p>Voici votre nouveau mot de passe: '.$password.'</p>
			<p>Pour plus de sécurité pensez à le changer une fois connecté.</p><br/>
			<p>Teamspeak: ts.activ-gaming.com</p>
			<p>Site: http://activ-gaming.com</p>
			<p>Bon jeu !</p>
			';

			//On construit les headers
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: '.$toname.' <'.$to.'>' . "\r\n";
			$headers .= 'From: '.$fromname.' <'.$from.'>' . "\r\n";
			$headers .= 'Delivered-to: '.$to."\n"; // Destinataire

			mail($to, $subject, $body, $headers);
			
			// Hasher le mot de passe pour la sécurité
			$password_hash = md5($password);
			
			// Enregistrer le mot de passe aléatoire dans la base de donnée
			$db->query('UPDATE users SET password = "'.$password_hash.'" WHERE username = "'.$username.'"');

			// Signaler à l'utilisateur que le mot de passe à été changé
			$password_changed = 1;
		}
	}
}

?>