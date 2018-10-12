<?php


function getEvent($id="", $limit="")
{
	global $db, $events;

	if (!empty($id))
	{
		$events = $db->query('SELECT * FROM events WHERE event_id = '.$id.'');

		return $events;
	}

	if (empty($limit))
	{
		$limit = 5;
	}

	$events = $db->query('SELECT * FROM events WHERE event_active = "visible" ORDER BY event_date DESC LIMIT '.$limit.'');

	return $events;
}

function getHideEvent()
{
	global $db, $events;

	$events = $db->query('SELECT * FROM events WHERE event_active = "hide"');

	return $events;
}

?>