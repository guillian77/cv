<?php

##############
# CONTROLLER #
##############


/**
* Networks panel
*/
require_once'application/side/views/networks.php';

/**
* Navigation panel
*/
require_once'application/side/views/navigation.php';

/**
* EVENT PANEL
* @var id -> Not use here, to select all from event table
* @var limit -> sideEventLimit Edit in: config/settings.php
*/
getEvent("", $conf['limit']['event']);
require_once'application/side/views/event.php';

/**
* Shop panel
*/
require_once'application/side/views/shop.php';

/**
* Twitter panel
*/
require_once'application/side/views/twitter.php';

/**
* Donation panel
*/
require_once'application/side/views/donation.php';

?>