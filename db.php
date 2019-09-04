<?php
/**
* PDO Singleton DB Class. 
*/
class DB {
	protected static $instance;

    protected function __construct() {}
    
	public static function getInstance() {
		
		if(empty(self::$instance)) {
			$config = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/config.ini");
			try {
				self::$instance = new PDO("mysql:host=".$config["host"].';port='.$config['port'].';dbname='.$config['dbName'], $config['user'], $config['pass']);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');
			} catch(PDOException $error) {
				echo $error->getMessage();
			}
		}
		return self::$instance;
	}
}