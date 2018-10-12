<?php

/**
* BLOG CONTROLLER
* 
* @author 		Dekadmin
* @copyright	Activ Gaming http://activ-gaming.com
*/

/**
* CREER UN ARTICLE
*/
if ($_GET['view'] == "create")
{
	require'application/blog/models/blog.php';

	// Récupérer les différentes catégories
	getCategory();

	if ($_GET['action'] == "do_create")
	{
		/**
		* Exclure le code HTML
		*/
		$categorie = strip_tags($_POST['categorie']);
		$title = strip_tags($_POST['title']);
		$text = skipScript($_POST['text']);
		$banner = strip_tags($_POST['banner']);
		$pinned = strip_tags($_POST['pinned']);

		// Vérifier les erreurs suivantes
		$error = NULL;
		
		if (empty($categorie)) { $error = "Vous devez préciser une catégorie pour cet article."; }
		if (empty($title)) { $error = "Vous devez saisir un titre pour cet article."; }
		if (empty($text)) { $error = "L'article doit avoir du contenu."; }
		if (empty($banner)) { $error = "Vous devez spécifier l'adresse d'une bannière."; }
		if (!isset($_SESSION['uid'])) { $error = "Vous devez être connecté afin de créer un article."; }
		if (!isset($_SESSION['is_admin'])) { $error = "Vous devez être administrateur afin de créer un article."; }

		/**
		* Enregistrer post dans la BDD
		*/
		if (empty($error))
		{
			createArticle($categorie, $title, $text, $banner, $_SESSION['uid'], $pinned);
			
			// Redirect on article view
			echo '<meta http-equiv="refresh" content="3; url=?page=blog&name=Derniers%20Articles" />';
		}
	}

	/**
	* Afficher la vue
	*/
	require'application/blog/views/create.php';
}

/**
* EDITER UN ARTICLE
*/
if ($_GET['view'] == "edit")
{
	/**
	* Exclure le code HTML
	*/
	$aid = strip_tags($_GET['id']);
	$categorie = strip_tags($_POST['categorie']);
	$title = strip_tags($_POST['title']);
	$text = skipScript($_POST['text']);
	$banner = strip_tags($_POST['banner']);
	$pinned = strip_tags($_POST['pinned']);

	// Vérifier les erreurs suivantes
	$error = NULL;

	if (empty($aid)) { $error = "L'URL ne semble pas correct."; }
	if (empty($categorie)) { $error = "Vous devez préciser une catégorie pour cet article."; }
	if (empty($title)) { $error = "Vous devez saisir un titre pour cet article."; }
	if (empty($text)) { $error = "L'article doit avoir du contenu."; }
	if (empty($banner)) { $error = "Vous devez spécifier l'adresse d'une bannière."; }
	if (!isset($_SESSION['uid'])) { $error = "Vous devez être connecté afin d'éditer un article."; }
	if (!isset($_SESSION['is_admin'])) { $error = "Vous devez être administrateur afin d'éditer un article."; }

	if (empty($pinned)) { $pinned = 0; }

	require'application/blog/models/blog.php';

	getCategory();
	getArticle($aid);

	if ($_GET['action'] == "do_edit" AND empty($error))
	{
		updateArticle($aid, $categorie, $title, $text, $banner, $pinned);
		
		// Redirect to article view page
		echo '<meta http-equiv="refresh" content="1; url=?page=blog&view=article&name='.$title.'&id='.$aid.'" />';
	}

	require'application/blog/views/edit.php';
}

/**
* SUPPRIMER UN ARTICLE
*/
if ($_GET['view'] == "delete" AND isset($_SESSION['is_admin']))
{
	require'application/blog/models/blog.php';
	deleteArticle($_GET['id']);
	require'application/blog/views/delete.php';
	echo '<meta http-equiv="refresh" content="3; url=?page=blog&name=Derniers%20Articles" />';
}

/**
* AFFICHER UN ARTICLE
*/

if($_GET['view'] == "article")
{
	require'application/blog/models/blog.php';

	/**
	* Récupérer infos dans BDD
	*/
	getArticle($_GET['id']);
	getNbrComment($_GET['id'], 1);
	getComment($_GET['id'], 1);
	
	getUsersInfos($post['a_author'], "");
	setView($_GET['id']);

	getSimilarArticle($_GET['id']);

	/**
	* Ajouter un commentaire
	*/
	if (!empty($_POST['comment']))
	{
		$pid = strip_tags($_GET['id']);
		$content = strip_tags($_POST['comment']);

		setComment($pid, 1, $content, $_SESSION['uid']);
		updateCommentCount($_SESSION['uid']);

		echo '<meta http-equiv="refresh" content="0; url='.$_SERVER['HTTP_REFERER'].'" />';
	}

	/**
	* Afficher la vue
	*/
	require'application/blog/views/article.php';
}

/**
* LISTER LES ARTICLES
*/
if(empty($_GET['view']) OR $_GET['view'] == "list")
{
	require'application/blog/models/blog.php';
	getPinnedArticle(2);
	getNbSearch();
	getArticlePerPage($_GET['numpage'], 5);
	require'application/blog/views/list.php';
}

?>