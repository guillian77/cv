<?php

/**
* Traite l'URL envoyé par l'utilisateur
*/
class Request
{
	public $url; // URL appelé par l'utilisateur

	function __construct()
	{
		if (empty($_SERVER['PATH_INFO'])) {
			$this->url = "home";
		} else {
			$this->url = $_SERVER['PATH_INFO'];
		}
	}
}