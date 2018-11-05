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
	 * Méthode appelé par défaut.
	 * Permet l'affichage et la gestion de la vue "index.php"
	 * @return void
	 */
	function index() {
		if ($_POST == TRUE) { self::setMessage($_POST); }
	}

	/**
	 * success
	 * Permet l'affichage et la gestion de la vue "success.php".
	 * @return void
	 */
	function success() {
		// Affichage de la vue "success.php".
	}

	/**
	* checkEntries
	* Eliminer les caractères HTML.
	* Vérifier que tous les champs soient remplis.
	* @var array checked Contient les données de $_POST.
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
	* Enregistrer le message dans la base de données.
	* @param array entries Contient les données de $_POST.
	*/
	private function setMessage($entries) {
		$entries = self::checkEntries($entries);
		if ($this->error == NULL) {
			$contactModel = parent::loadModel('contact');
			$registered = $contactModel->setMessage($entries);
			
			if ($registered == true) {
				// TO DO
				// sendMail(Conf::settings['network']['mail']);
				header('Location: '.BASE_URL.'contact/success');
			} else {
				$this->error = "Quelque chose ne s'est pas bien passé";
			}
		}
	}

	/**
	* sendMail
	* Envoyer un mail en fonction d'une adresse de messagerie.
	* @param string mail L'email du destinataire.
	*/
	private function sendMail($mail) {
		// TO DO:
		// Need to use Trait system
	}
}