<?php

/**
 * ContactModel
 */
class ContactModel extends Model
{

	/**
	* setMessage
	* Enregistrer un message dans la base de donées
	* @param array entries Champs du formulaire de la page contact: 'name', 'subject'
	*/
	public function setMessage($entries) {
		// TO DO
		$db->prepare('INSERT INTO users');
	}


	/**
	* getMessage
	* Consulter un message dans la base de données
	*/
	public function getMessage() {
		// TO DO
	}
}