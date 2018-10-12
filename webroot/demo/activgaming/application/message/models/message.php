<?php

/**
* Lister les conversations pour un utilisateur
*
* @param $uid ID de l'utilisateur
*/
function getConversationsList($uid) {
	global $db, $conversations;

	$req = 'SELECT * FROM conversations';
	$req .= ' LEFT JOIN users ON users.uid = conversations.c_from_id';
	$req .= ' WHERE c_to_id = '.$uid.' OR c_from_id = '.$uid.' ORDER BY c_create_at DESC';

	return $conversations = $db->query($req);
}

/**
* Récupérer les messages d'une conversation
*
* @param $cid ID de la conversation
*/
function getConversationMessages($cid) {
	global $db, $messages;

	$req = 'SELECT * FROM messages';
	$req .= ' LEFT JOIN conversations ON conversations.c_id = messages.m_conversation';
	$req .= ' LEFT JOIN users ON users.uid = messages.m_from_id';
	$req .= ' WHERE m_conversation = '.$cid.' ORDER BY m_create_at DESC';

	return $messages = $db->query($req);
}

/**
* Ajouter message dans une conversation
*
* @param $conv ID de la conversation parent
* @param $from ID utilisateur envoyeur
* @param $to ID utilisateur récepteur
* @param $content Contenu du message 
*/
function setMessageToConv($conv,$from,$to,$content) {
	global $db;

	$req = $db->prepare('INSERT INTO messages 
		(m_conversation,m_from_id,m_to_id,m_create_at,m_content) VALUES 
		(:m_conversation,:m_from_id,:m_to_id,:m_create_at,:m_content)');
	$req->bindParam(':m_conversation', $conv);
	$req->bindParam(':m_from_id', $from);
	$req->bindParam(':m_to_id', $to);
	$req->bindParam(':m_create_at', time());
	$req->bindParam(':m_content', $content);

	$req->execute();

}

function setReadedConv($cid) {
	global $db;
	
	$req = 'SELECT m_id FROM messages';
	$req .= ' LEFT JOIN conversations ON conversations.c_id = messages.m_conversation';
	$req .= ' WHERE m_conversation = '.$cid.' ORDER BY m_create_at DESC LIMIT 1';

	$msg = $db->query($req);

	$lastMsgId = $msg->fetch(PDO::FETCH_ASSOC);

	$readtime = time();
	$db->query('UPDATE messages SET m_read_at = '.$readtime.' WHERE m_id = '.$lastMsgId['m_id'].'');
}

/**
*
*/
function setNewConversation($from, $to, $title, $content) {
	global $db;

	$user = $db->query('SELECT uid FROM users WHERE username = "'.$to.'"');
	$targetUser = $user->fetch(PDO::FETCH_ASSOC);
 
	$cvts = $db->prepare('INSERT INTO conversations 
		(c_from_id,c_to_id,c_create_at,c_title) VALUES 
		(:c_from_id,:c_to_id,:c_create_at,:c_title)');
	$cvts->bindParam(':c_from_id', $from);
	$cvts->bindParam(':c_to_id', $targetUser['uid']);
	$cvts->bindParam(':c_create_at', time());
	$cvts->bindParam(':c_title', $title);
	$cvts->execute();

	$conversationId = $db->lastInsertId();

	$msg = $db->prepare('INSERT INTO messages 
		(m_conversation,m_from_id,m_to_id,m_create_at,m_content) VALUES 
		(:m_conversation,:m_from_id,:m_to_id,:m_create_at,:m_content)');
	$msg->bindParam(':m_conversation', $conversationId);
	$msg->bindParam(':m_from_id', $from);
	$msg->bindParam(':m_to_id', $targetUser['uid']);
	$msg->bindParam(':m_create_at', time());
	$msg->bindParam(':m_content', $content);
	$msg->execute();
}