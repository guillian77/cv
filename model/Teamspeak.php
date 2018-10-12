<?php

/**
* 
*/
class Teamspeak extends Model
{
	public $host;
	public $user;
	public $password;
	public $serverport;
	public $queryport;

	public $status;
	public $onlineusers;
	public $maxusers;
	public $ts3stmt=null;

	function __construct()
	{
		try
		{
			$this->ts3stmt = TeamSpeak3::factory("serverquery://".Conf::$settings['tsquery']['user'].":".Conf::$settings['tsquery']['password']."@".Conf::$settings['tsquery']['host'].":".Conf::$settings['tsquery']['queryport']."/?server_port=".Conf::$settings['tsquery']['serverport']."&use_offline_as_virtual=1&no_query_clients=1");
			$this->status = $this->ts3stmt->getProperty("virtualserver_status");
			$this->onlineusers = $this->ts3stmt->getProperty("virtualserver_clientsonline") - $this->ts3stmt->getProperty("virtualserver_queryclientsonline");
			$this->maxusers = $this->ts3stmt->getProperty("virtualserver_maxclients");
		}
		
		catch (Exception $e)
		{
			if (Conf::$settings['debug'] >= 1) {
				echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
			}
		}
	}

	
}