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

			try {
			    if (!isset($this->db)) {
					$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->table.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				}
			}
			catch( PDOException $Exception ) {
			    // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
			    // String.
			    throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			}
	}
}