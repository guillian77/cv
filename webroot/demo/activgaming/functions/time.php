<?php

// Le numéro du jours
function getDayNum($timestamp)
{
	return $eventDayNum = strftime("%e", $timestamp);
}

// Le mois sous trois lettres
function getMonth($timestamp)
{
	return $eventMonth = strftime("%b", $timestamp);
}

// Le mois sous trois lettres
function getYear($timestamp)
{
	return $eventMonth = strftime("%Y", $timestamp);
}

// L'heure sous cette forme: 24h00
function getHour($timestamp)
{
	$eventHour = strftime("%H", $timestamp);
	$eventMinutes = strftime("%M", $timestamp);

	$eventTimeline = $eventHour.'h'.$eventMinutes;
	return $eventTimeline;
}

function getTextDate($timestamp)
{
	$textDate = getDayNum($timestamp).' '.getMonth($timestamp);

	return $textDate;
}

// Le jours sous trois lettres
function getShortDate($timestamp)
{
	return $eventDayNum = strftime("%d/%m/%Y", $timestamp);
}

?>