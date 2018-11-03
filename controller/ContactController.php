<?php

/**
* ContactController
*/

class ContactController extends Controller
{

	public $pageName = "Contact";

	/**
	* index
	* Default function to call the view
	*/
	function index() {
		self::setMessage($_POST);
	}

	/**
	* checkEntries
	* Elimine html chars on form inputs
	*/
	private function checkEntries($entries) {
		$checked = array();
		foreach ($entries as $entrie =>$value) {
			$checked[$entrie] = htmlspecialchars($value);
		}
		return $checked;
	}

	/**
	* setMessage
	* Save user message in to the database
	* @param array entries Datas came from formlaire inputs
	*/
	private function setMessage($entries) {
		$contactModel = parent::loadModel('contact');
		$contactModel->setMessage(self::checkEntries($entries));
		// TO DO
	}
}