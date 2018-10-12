<?php

/**
* Database
* Connect to all database required
*
* db 		website database table
* dbts3 	teamspeak database table
*/

try
{
	$db = new PDO("mysql:host=".$conf['db_site']['host'].";dbname=".$conf['db_site']['table']."", $conf['db_site']['user'], $conf['db_site']['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$dbts3 = new PDO("mysql:host=".$conf['db_ts']['host'].";dbname=".$conf['db_ts']['table']."", $conf['db_ts']['user'], $conf['db_ts']['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); 
	$dbts3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
	if ($conf['web']['debug'] == 1) {
		echo "Connection failed: " . $e->getMessage();
	}
}

?>