<?php

class Model {
	public $host;
	public $user;
	public $password;
	public $table;
	public $db;
	public $tsdb;


	function __construct()
	{
			$this->host = Conf::$settings['db']['host'];
			$this->table = Conf::$settings['db']['table'];
			$this->user = Conf::$settings['db']['user'];
			$this->password = Conf::$settings['db']['password'];

			$this->host = Conf::$settings['tsdb']['host'];
			$this->table = Conf::$settings['tsdb']['table'];
			$this->user = Conf::$settings['tsdb']['user'];
			$this->password = Conf::$settings['tsdb']['password'];
	}

	public function connectWebsite() {
		if (!isset($this->db)) {
			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->table.'', $this->user, $this->password);
		}
	}

	public function connectTeamspeak() {
		if (!isset($this->tsdb)) {
			$this->tsdb = new PDO('mysql:host='.$this->host.';dbname='.$this->table.'', $this->user, $this->password);
		}
	}
}