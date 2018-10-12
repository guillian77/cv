<?php

function getNbSearch()
{
	global $db, $nbsearch;
	
	/**
	* Nombre total d'articles présents
	*/
	$nbarticles = 0;
	/**
	* Nombre d'articles par pages
	*/
	$nbperpage = 5;
	
	$articles = $db->query('SELECT * FROM articles ORDER BY a_id');
	foreach ($articles as $article)
	{
		$nbarticles++;
	}
	
	/**
	* Nombre de recherche
	*/
	$nbsearch = ceil($nbarticles/$nbperpage);

	return $nbsearch;
}

?>