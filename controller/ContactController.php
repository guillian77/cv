<?php

/**
* ContactController
*/

class ContactController extends Controller
{

	public $pageName = "Contact";
	public $error = NULL;

	/**
	* index
	* Méthode par défaut pour afficher la vue
	*/
	function index() {
		if ($_POST == TRUE) {
			self::setMessage($_POST);
		}
	}

	function success() {

	}

	/**
	* checkEntries
	* Eliminer les caractères HTML
	* Vérifier que tous les champs soient remplis
	* @var array checked Contient les données de $_POST
	*/
	private function checkEntries($entries) {
		$checked = array();
		foreach ($entries as $entrie =>$value) {
			$checked[$entrie] = htmlspecialchars($value);
			
			// Vérifier que l'entrée ne soit pas vide
			if (empty($checked[$entrie])) {
				return $this->error = "Un des champs n'est pas correctement renseigné";
			}
		}
		return $checked;
	}

	/**
	* setMessage
	* Enregistrer le message dans la base de données
	* @param array entries Contient les données de $_POST
	*/
	private function setMessage($entries) {
		$entries = self::checkEntries($entries);
		if ($this->error == NULL) {
			$contactModel = parent::loadModel('contact');
			$registered = $contactModel->setMessage($entries);
			
			if ($registered == true) {
				header('Location: '.BASE_URL.'contact/success');
			} else {
				$this->error = "Quelque chose ne s'est pas bien passé";
			}
		}
	}
}