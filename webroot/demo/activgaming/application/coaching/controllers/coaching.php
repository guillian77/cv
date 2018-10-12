<?php


require 'application/coaching/models/coachs.php';

/**
* Tableau des groupes des coatchs
*/
$coatchsGroups = array(72);

getCoatchsList($coatchsGroups);

require 'application/coaching/views/coachs.php';

?>