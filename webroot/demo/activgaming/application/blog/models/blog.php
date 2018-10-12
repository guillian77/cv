<?php

/**
* BLOG MODEL
* 
* @author 		Dekadmin
* @copyright	Activ Gaming
*/

/**
* Récupérer les catégories dans la BDD
*/
function getCategory()
{
	global $db, $categories;

	$categories = $db->query('SELECT * from categories ORDER BY c_order ASC');

	return $categories;
}

/**
* Récupérer les données d'un articles
* @var aid 		ID de l'article
* @var limit 	Limit d'article max
*/
function getArticle($aid, $limit)
{
	global $db, $articles;

	if (!empty($aid)) {
		$articles = $db->query('SELECT * FROM articles
			LEFT JOIN users ON articles.a_author = users.uid
			LEFT JOIN usergroups ON users.usergroup = usergroups.gid
			LEFT JOIN categories ON articles.a_categorie = categories.c_id
			WHERE a_id = "'.$aid.'"');
	}
	else {
		$articles = $db->query('SELECT * FROM articles
			LEFT JOIN users ON articles.a_author = users.uid
			LEFT JOIN categories ON articles.a_categorie = categories.c_id
			ORDER BY a_id DESC LIMIT '.$limit.'');
	}
	return $articles;
}

/**
* Récupérer les articles sous forme de pagination [lié à functions/pagination.php]
*/
function getArticlePerPage($numpage, $nbperpage)
{
	global $db, $articles;

	if (empty($numpage) OR !isset($numpage))
	{
		$numpage = 1;
	}

	$index = ($numpage-1)*$nbperpage;

	$articles = $db->query('SELECT * FROM articles
		LEFT JOIN users ON articles.a_author = users.uid
		LEFT JOIN categories ON articles.a_categorie = categories.c_id
		WHERE a_pinned != 1 ORDER BY a_id DESC LIMIT '.$index.','.$nbperpage.'');
	
	return $articles;
	
}

/**
* Récupérer les données des articles épinglé
* @var limit 	Limit d'article max
*/
function getPinnedArticle($limit)
{
	global $db, $pinned_articles;

	
	$pinned_articles = $db->query('SELECT * FROM articles
		LEFT JOIN users ON articles.a_author = uid
		LEFT JOIN categories ON articles.a_categorie = categories.c_id
		WHERE a_pinned = 1 ORDER BY a_id DESC LIMIT '.$limit.'');
	
	return $pinned_articles;
}

/**
* Créer un article dans la BDD
* @var prefix 	Prefix de l'article
* @var title 	Titre de l'article
* @var content 	Contenu texte de l'article
* @var banner 	Url de la bannière de l'article
* @var author 	ID(user) de l'auteur de l'article
* @var username Nom d'utilisateur de l'article
* @var pinned 	1 -> Article épinglé(important)
*/
function createArticle($categorie, $title, $content, $banner, $author, $pinned)
{
	global $db, $created;

	if (empty($pinned)) { $pinned = 0; }	
	
	$stmt = $db->prepare("INSERT INTO articles (a_categorie, a_title, a_content, a_date, a_banner, a_author, a_pinned) 
	VALUES (:categorie, :title, :content, :adate, :banner,:author, :pinned)");
	$stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':adate', time());
    $stmt->bindParam(':banner', $banner);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':pinned', $pinned);
    $stmt->execute();


    /**
    * Retourner l'ID de l'article créé pour la redirection
    */

    $created = 1;
}

/**
* Editer un article déjà existant
* @var aid 		ID de l'article
* @var prefix 	Prefix de l'article
* @var title 	Titre de l'article
* @var content 	Contenu texte de l'article
* @var banner 	Url de la bannière de l'article
* @var author 	ID(user) de l'auteur de l'article
* @var username Nom d'utilisateur de l'article
* @var pinned 	1 -> Article épinglé(important)
*/
function updateArticle($aid, $categorie, $title, $content, $banner, $pinned)
{
	global $db, $updated;

	$req = $db->prepare('UPDATE articles SET a_categorie = :categorie, a_title = :title, a_content = :content, a_banner = :banner, a_pinned = :pinned WHERE a_id = "'.$aid.'"');
	$req->execute(array(
		'categorie' => $categorie,
		'title' => $title,
		'content' => $content,
		'banner' => $banner,
		'pinned' => $pinned
		));
	$updated = 1;
}

/**
* Supprimer un article
*/
function deleteArticle($aid)
{
	global $db, $deleted;

	$db->query('DELETE FROM articles WHERE a_id = "'.$aid.'"');

	return $deleted = 1;
}

function getSimilarArticle($aid)
{
	global $db, $similars;

	$articlesPrefix = $db->query('SELECT a_categorie FROM articles WHERE a_id = '.$aid.'');
	$prefix = $articlesPrefix->fetch();

	$similars = $db->query('SELECT * FROM articles LEFT JOIN categories ON articles.a_categorie = categories.c_id WHERE a_categorie LIKE "'.$prefix['a_categorie'].'" LIMIT 4');

	return $similars;
}

/**
* Ajouter une vue en plus à l'affichage d'un poste (compteur nombre de vues)
*/
function setView($post_num)
{
	global $db, $count;

	# Récupérer nombre de vues actuelles
	$articles = $db->query('SELECT * FROM articles WHERE a_id = "'.$post_num.'"');
	foreach ($articles as $post) {
		$count = $post['a_view'];
	}

	# Ajouter une vue au nombre actuel
	$count++;

	# Mettre à jours le nombre de vues
	$view = $db->query('UPDATE articles SET a_view = "'.$count.'" WHERE a_id = "'.$post_num.'"');
}

?>