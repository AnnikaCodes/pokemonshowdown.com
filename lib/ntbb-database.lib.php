<?php

//debug_print_backtrace();
//die();

include_once dirname(__FILE__).'/../config/config.inc.php';

class NTBBDatabase {
	var $db = null;

	var $server = null;
	var $username = null;
	var $password = null;
	var $database = null;
	//var $queries = array();

	function NTBBDatabase($server, $username, $database, $password, $port) {
		$this->server = $server;
		$this->username = $username;
		$this->database = $database;
		$this->password = $password;
		$this->port = $port;
	}

	function connect() {
		if (!$this->db) {
			$connection_string = "host='{$this->server}'";
			$connection_string .= " username='{$this->username}'";
			if ($this->password) $connection_string .= " password='{$this->password}'";
			$connection_string .= " dbname='{$this->database}'";
			$connection_string .= " port='{$this->port}'";
			$this->db = pg_connect($connection_string);
		}
	}
	function query($query) {
		$this->connect();
		//$this->queries[] = $query;
		return pg_query($this->db, $query);
	}
	function fetch_assoc($resource) {
		return pg_fetch_assoc($resource);
	}
	function fetch($resource) {
		return pg_fetch_assoc($resource);
	}
	function escape($data) {
		$this->connect();
		return pg_escape_literal($this->db, $data);
	}
}

$psdb = new NTBBDatabase($psconfig['server'],
		$psconfig['username'],
		$psconfig['database'],
		$psconfig['password'] ?? false,
		$psconfig['port'] ?? '5432');
