<?php

/**
* CREER UN EVENT
*
* @var title	Titre de l'event
* @var date 	Date de l'event en timestamp
* @var time 	Heure de l'event en timestamp
* @var content 	Contenu de l'event
* @var banner 	Bannière de l'event
* @var location Lieu où se produit l'event
*/

function setEvent($title, $date, $time, $content, $banner, $location, $active)
{
	global $db, $created;

	

	// echo  strftime("%A %e %B %Y à %Hh%M", $dateline);
	
	$stmt = $db->prepare("INSERT INTO events (event_title,event_date,event_time,event_description,event_banner, event_location, event_active) VALUES 
		(:title, :e_date,:e_time,:description,:banner,:location, :active)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':e_date', $date);
    $stmt->bindParam(':e_time', $time);
    $stmt->bindParam(':description', $content);
    $stmt->bindParam(':banner', $banner);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':active', $active);
    $stmt->execute();

    $created = 1;
}

/**
* EDITER UN EVENT
*
* @var eid 		ID de l'event
* @var title 	Titre de l'event
* @var content 	Contenu de l'event
* @var banner 	Bannière de l'event
*/
function updateEvent($eid, $title, $date, $time, $content, $banner, $location, $active)
{
	global $db, $updated;

	$req = $db->prepare('UPDATE events SET event_title = :title, event_date = :e_date, event_time = :e_time, event_description = :content, event_banner = :banner,  event_location = :location, event_active = :active WHERE event_id = "'.$eid.'"');
	$req->execute(array(
		'title' => $title,
		'e_date' => $date,
		'e_time' => $time,
		'content' => $content,
		'banner' => $banner,
		'location' => $location,
		'active' => $active
		));
	$updated = 1;
}

function deleteEvent($eid)
{
	global $db, $deleted;

	$db->query('DELETE FROM events WHERE event_id = "'.$eid.'"');

	return $deleted = 1;
}

?>