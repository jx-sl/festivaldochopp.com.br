<?php
/*
$GLOBALS['DB_HOST'] = "localhost";
$GLOBALS['DB_NAME'] = "festival_gerenciador";
$GLOBALS['DB_USER'] = "festival_admin";
$GLOBALS['DB_PASS'] = "admin@festival";
*/
if($_SERVER["HTTP_HOST"]=="localhost"){
	define( "DB_HOST", "#");
	define( "DB_NAME", "#");
	define( "DB_USER", "#");
	define( "DB_PASS", "#");
}else{
	define( "DB_HOST", "#");
	define( "DB_NAME", "#");
	define( "DB_USER", "#");
	define( "DB_PASS", "#");
}
class Database{
	var $host;
	var $user;
	var $pass;
	var $connection;
	var $database;
	function __construct($host=null, $user=null, $pass=null){
		$this->database=DB_NAME;
		$this->host=DB_HOST;
		$this->user=DB_USER;
		$this->pass=DB_PASS;
	}
	function getHost(){
		return $this->host;
	}
	function setHost($host){
		$this->host=$host;
	}
	function getUser(){
		return $this->host;
	}
	function setUser($user){
		$this->user=$user;
	}
	function getPass(){
		return $this->pass;
	}
	function setPass($pass){
		$this->pass=$pass;
	}
	function getConnection(){
		return $this->connection;
	}
	function setConnection($connection){
		$this->connection=$connection;
	}
	function getDatabase(){
		return $this->database;
	}
	function setDatabase($database){
		$this->database=$database;
	}
	function connect(){
		$this->setConnection(mysql_connect($this->host, $this->user, $this->pass));
		if(!$this->connection)
			return false;
		return true;
	}
	function selectDb(){
		$result = mysql_select_db($this->database, $this->connection) or die(mysql_error());
		if(!$result)
			return "erro";
		return "ok";
	}	
	
	function create($table, $rows, $values){
		$query = "INSERT INTO ".$table."( ".$rows.", data_criacao) VALUES (".$values.", NOW())";
		//die($query);
		$result = mysql_query($query) or die(mysql_error());
		if(!$result)
			return "erro";
		return "ok";
	}
	
	
	function read($itens, $table, $where=null){		
		$query = "SELECT ".$itens." FROM ".$table;
		if($where!=null)
			$query.=	" WHERE ".$where;
		//die($query);
		$result = mysql_query($query) or die(mysql_error());
		if(!$result)
			return "erro";
		if (mysql_num_rows($result) > 0) {
			$ret = array();
			while ($row = mysql_fetch_assoc($result)) {
				array_push($ret, $row);
			}
			return $ret;
		}else{
			return "zero";
		}
	}
	
	
	function update($table, $rowsAndValues, $where){
		$query = "UPDATE ".$table." SET ".$rowsAndValues." WHERE ".$where;
		//die($query);
		$result = mysql_query($query);		
		return $result;		
	}
	function delete($table, $where){	
		$query = "DELETE FROM ".$table." WHERE ".$where;
		$result = mysql_query($query);		
		return $result;
	}
}
