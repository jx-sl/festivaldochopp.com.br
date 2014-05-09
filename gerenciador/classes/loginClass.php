<?php
class Login{
	var $userName;
	var $userLogin;
	var $userPass;
	function __construct($userLogin, $userPass) {
		$this->userLogin=$userLogin;
		$this->userPass=$userPass;
	}
	function setUserName($userName){
		$this->userName=$userName;
	}
	function getUserName(){
		return $this->userName;
	}
	function setUserLogin($userLogin){
		$this->userLogin=$userLogin;
	}
	function getUserLogin(){
		return $this->userLogin;
	}
	function setUserPass($userPass){
		$this->userPass=$userPass;
	}
	function getUserPass(){
		return $this->userPass;
	}
	function isLogged(){
		if(isset($_SESSION['festival_admin'])){
			return true;
		}
		return false;
	}
	function doLogin(){
		include "dataBaseClass.php";
		$db = new Database();
		if($db->connect()){
			$db->selectDb();
			$value = "login='".$this->userLogin."' AND pass = MD5( ".$this->userPass." )";
			$retorno = $db->read("login, pass", "usuarios", $value);
			if($retorno=="erro"){
				return false;
			}else if($retorno=="zero"){
				return false;
			}else{
				$numItens = count($retorno);
				if($numItens>0){
					session_start();
					$_SESSION['festival_admin'] = "sGFHZDFGH";
					return true;	
				}
			}
		}
		return false;
	}
	function logaMock(){
		session_start();
		$_SESSION['festival_admin'] = md5("sdg");			
	}
}