<?php

/**
* ContactController
*/

class ContactController extends Controller
{

	public $pageName = "Contact";

	function index() {
		self::setMessage($_POST);
	}

	private function checkEntries($entries) {
		$checked = array();
		foreach ($entries as $entrie =>$value) {
			$checked[$entrie] = htmlspecialchars($value);
		}
		return $checked;
	}

	private function setMessage($entries) {
		$contactModel = parent::loadModel('contact');
		$contactModel->setMessage(self::checkEntries($entries));
		// TO DO
	}
}