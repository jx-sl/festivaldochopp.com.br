<?php

require '../classes/dataBaseClass.php';
$pagina=$id=null;
$error=false;
if(isset($_GET)){
	if(isset($_GET["pg"]) && isset($_GET["id"])){
		$pagina=$_GET["pg"];
		$id=$_GET["id"];
	}else{
		die(1);
		$error=true;
	}		
}else{
		die(2);
	$error=true;
}	

$db = new Database();
if($db->connect()){
	$db->selectDb();
}else{
	$error=true;
}
if($error){
	header("Location: ../".$pagina.".php?msg=erro1");
}else{
	$imgArray = $db->read("imagem", $pagina, "id=".$id);
	$imagem = $imgArray[0]['imagem'];
	$retorno = $db->delete($pagina, "id=".$id);
	if($retorno=="ok"){
		unlink("../../uploads/thumbs/".$imagem);
		unlink("../../uploads/medias/".$imagem);
		unlink("../../uploads/".$imagem);
		header("Location: ../".$pagina.".php?msg=ok");
	}else{
		header("Location: ../".$pagina.".php?msg=erro2");
	}
}
	/*
$sql = "INSERT INTO $pagina (titulo, imagem_capa, ativo, data_criacao) VALUES ('$titulo', '$img_name', '$ativo', NOW())";

if($error){
	echo "Erros: ".$msg_error;
}else{
	mysql_query($sql) or die(mysql_error());
}
*/

