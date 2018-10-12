<?php

function uploadFile($username)
{
	$uploaddir = '../uploads/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if (!empty($_FILES['userfile']['name']) AND !empty($_FILES['userfile']['tmp_name']))
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

		// Vérifier l'upload du fichier
		if (file_exists($uploaddir))
		{
	 		$valid = 1;
	 	}
	}
}

// uploadFile();

?>

<!-- form enctype="multipart/form-data" action="upload.php" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="99999930000" />
	<input name="userfile" type="file" />
	<input type="submit" value="Envoyer le fichier" />
</form>
 -->