<?php
class Page{
	var $pageUrl;
	var $pageAction;
	var $pageActionId;
	var $pageContent;
	var $pageTemplate;
	
	function __construct($pageUrl='home', $pageAction='view', $pageActionId=null, $pageContent=null, $pageTemplate=null){
		$this->pageUrl=$pageUrl;
		$this->pageAction=$pageAction;
		$this->pageActionId=$pageActionId;
		$this->pageContent=$pageContent;
		$this->pageTemplate=$pageTemplate;
	}
	function setPageUrl($pageUrl){
		$this->pageUrl=$pageUrl;
	}
	function getPageUrl(){
		return $this->pageUrl;
	}
	function setPageAction($pageAction){
		$this->pageAction=$pageAction;
	}
	function getPageAction(){
		return $this->pageAction;
	}
	function setPageActionId($pageActionId){
		$this->pageActionId=$pageActionId;
	}
	function getPageActionId(){
		return $this->pageActionId;
	}
	function setPageContent($pageContent){
		$this->pageContent=$pageContent;
	}
	/*
	function getPageContent(){
		return $this->pageContent;
	}
	*/
	function setPageTemplate($pageTemplate){
		$this->pageTemplate=$pageTemplate;
	}
	function getPageTemplate(){
		return $this->pageTemplate;
	}
	public function getPage(){
		if($this->validaLogin()){
			$this->validaUrl();
			if(isset($_REQUEST["act"])){
				$pageAction=$_REQUEST["act"];
				if($pageAction=="delete" || $pageAction=="update"){
					if(isset($_REQUEST["oid"])){
						$pageActionId=$_REQUEST["oid"];
					}
				}				
			}
			include 'pages/'.$this->getPageUrl().'.php';
			//die($this->getPageUrl());
			include 'templates/default.php';
		}
		$this->validaUrl();
	}
	public function validaLogin(){
		include_once 'classes/loginClass.php';
		Login::logaMock();
		if(Login::isLogged()){
			return true;
		}
		return false;
	}
	
	
	function getPageContent($itens, $table, $where){
		$out;
		include_once 'classes/dataBaseClass.php';
		$db = new Database();
		if($db->connect()){
			$db->selectDb();
			$retorno = $db->read($itens, $table, $where);
			if($retorno=="erro"){
				$out = 1;
				$out="<tr><td colspan='5'>Ocorreu um erro ao carregar os dados</td><tr>";
			}else if($retorno=="zero"){
				$out = "<tr><td colspan='5'>Nenhum item cadastrado ate o momento!</td><tr>";
			}else{
				$numItens = count($retorno);
				if($numItens>0){
					$out = $retorno;	
				}else{
					$out = "<tr><td colspan='5'>Nenhum item cadastrado ate o momento</td><tr>";
				}
			}
		}else{
			$out="<tr><td colspan='5'>Ocorreu um erro ao conectar ao banco.</td><tr>";
		}
		return $out;		
	}
}