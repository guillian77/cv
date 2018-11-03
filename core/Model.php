<?php

class Model {
	public $host;
	private $user;
	private $password;
	private $table;
	public $db;


	function __construct()
	{
			$this->host = Conf::$settings['db']['host'];
			$this->table = Conf::$settings['db']['table'];
			$this->user = Conf::$settings['db']['user'];
			$this->password = Conf::$settings['db']['password'];

			if (!isset($this->db)) {
				$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->table.'', $this->user, $this->password);
			}
	}
}