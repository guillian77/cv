<?php

/**
* LISTER LES COMMENTAIRES
* @var pid 		ID du parent (id de l'article, profil ou event)
* @var type 	Type de commentaire: 1->article, 2->profil, 3->event
*/
function getComment($pid, $type)
{
	global $db, $comments;

	$comments = $db->query('SELECT * FROM comments LEFT JOIN users ON comments.c_author = users.uid WHERE c_parent = '.$pid.' AND c_type = '.$type.'');

	return $comments;
}

/**
* COMPTER LES COMMENTAIRES D'UN PARENT
* @var pid 		ID du parent (id de l'article, profil ou event)
* @var type 	Type de commentaire: 1->article, 2->profil, 3->event
*/
function getNbrComment($pid, $type)
{
	global $db, $nbrcomments;

	$comments = $db->query('SELECT * FROM comments LEFT JOIN users ON comments.c_author = users.uid WHERE c_parent = '.$pid.' AND c_type = '.$type.'');

	$nbrcomments = 0;

	foreach ($comments as $value) {
		$nbrcomments++;
	}

	return $nbrcomments;
}

/**
* AJOUTER UN COMMENTAIRE
* @var pid 		ID du parent (id de l'article, profil ou event)
* @var type 	Type de commentaire: 1->article, 2->profil, 3->event
*/
function setComment($pid, $type, $content, $author)
{
	global $db;

	/**
	* Insertion du commentaire dans la base de donées
	*/
	$stmt = $db->prepare("INSERT INTO comments (c_content, c_author, c_type, c_parent) VALUES (:content, :author, :type, :parent)");
	$stmt->bindParam(':content', $content);
	$stmt->bindParam(':author', $author);
	$stmt->bindParam(':type', $type);
	$stmt->bindParam(':parent', $pid);
	$stmt->execute();
}

?>