<?php

/**
* Limiter la taille d'une chaine de caractère à afficher
*/
function limitSize($text, $size)
{
	$str = mb_substr($text, 0, $size, 'UTF-8');

	return $str;
}

/**
* Supprimer les balises HTML <IMG>
*/
function deleteImage($texte)
{
	return $texte = str_replace("http", "", $texte);
}

/**
* Supprimer TOUTES les balises HTML
*/
function deleteCode($texte)
{
	return $texte = strip_tags($texte);
}

function addSpaces($texte)
{
	$count = strlen($texte);

	while ($count < 183)
	{
		$texte = $texte."&nbsp;";
	}

	return $texte;
}

function skipScript($text)
{
	$codes = array(
	"/<script>(.*?)<\/script>/is" => "$1",
	"/<\?php (.*?) \?>/is" => "$1",
	"/<!-- (.*?) -->/is" => "$1",
	"/<style>(.*?)<\/style>/is" => "$1"
	);
	$text = preg_replace(array_keys($codes), array_values($codes), $text);

	//$text = preg_replace('/\s&nbsp;\s/ig', ' ', $text);
	
	return $text;
}

function skipImage($text)
{
	$codes = array(
	"/<img (.*?)<\/>/is" => "",
	"/<\?php (.*?) \?>/is" => "$1",
	"/<!-- (.*?) -->/is" => "$1",
	"/<style>(.*?)<\/style>/is" => "$1"
	);

	$text = preg_replace(array_keys($codes), array_values($codes), $text);

	return $text;
}

?>