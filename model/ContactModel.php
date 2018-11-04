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
		$stmt = $this->db->prepare("INSERT INTO messages (name, mail, subject, content) VALUES (:name, :mail, :subject, :content)");
		$stmt->bindParam(':name', $entries['name']);
		$stmt->bindParam(':mail', $entries['mail']);
		$stmt->bindParam(':subject', $entries['subject']);
		$stmt->bindParam(':content', $entries['content']);

		return $stmt->execute();

	}


	/**
	* getMessage
	* Consulter un message dans la base de données
	*/
	public function getMessage() {
		// TO DO
	}
}