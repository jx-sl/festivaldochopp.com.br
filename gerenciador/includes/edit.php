<?php
require'../classes/class.upload/class.upload.php';
require '../classes/dataBaseClass.php';
$id;
if(isset($_POST['id'])) $id = $_POST['id'];

$galeria =  null;
if(isset($_POST['galeria'])) $galeria = $_POST['galeria'];

if(isset($_POST['titulo'])) $titulo = addslashes($_POST['titulo']);
if(isset($_POST['descricao'])) $descricao = addslashes($_POST['descricao']);
$link = null;
if(isset($_POST['link']))	$link=$_POST['link'];

$ativo = 1;
if(isset($_POST['ativo']))	$ativo=$_POST['ativo'];
$error=false;
$pagina=null;
if(isset($_POST['page']))	$pagina=$_POST['page'];

$img_name;
if(isset($_POST['img_atual']))	$img_name=$_POST['img_atual'];
$img_atual = $img_name;
$db = new Database();
if($db->connect()){
	$db->selectDb();
}else{
	$error=true;
}
$imgNova=false;


if(!empty($_FILES['imagem']) && $error==false){
	$img = ($_FILES['imagem']);
	$img_w="1";
	$img_h="0";

	// SE TIVER IMAGEM FAZ O UPLOAD
	if($img['tmp_name'] != ""){
		$img_size = getimagesize($img["tmp_name"]);
		$img_w = $img_size[0];
		$img_h = $img_size[1];
		$new_img = true;
		$upload_thumb = new Upload($img);
		$upload = new Upload($img);
		$upload_media = new Upload($img);

		if ($upload_thumb->uploaded && $upload->uploaded && $upload_media->uploaded){
			$upload_media->file_new_name_body	= "img";
			$upload_thumb->file_new_name_body	= "img";
			$upload->file_new_name_body   		= "img";
			$upload_media->allowed = array('image/jpg','image/jpeg','image/png','image/gif');
			$upload_thumb->allowed = array('image/jpg','image/jpeg','image/png','image/gif');
			$upload->allowed = array('image/jpg','image/jpeg','image/png','image/gif');
			$upload_media->image_convert 		= 'jpg';
			$upload_thumb->image_convert 		= 'jpg';
			$upload->image_convert 				= 'jpg';
			$upload_media->jpeg_quality         = 85;
			$upload_thumb->jpeg_quality         = 85;
			$upload->jpeg_quality          		= 90;

			$upload_media->image_resize  		= true;
			$upload_thumb->image_resize  		= true;
			$upload_thumb->image_ratio_crop     = true;
				
			$upload->image_resize         		= true;
				
			if($img_w>$img_h){
				$upload_media->image_x          = 300;
				$upload_media->image_y          = 90;
				$upload_thumb->image_x          = 100;
				$upload_thumb->image_y          = 30;
				$upload->image_x              	= 900;
				$upload->image_ratio_y       	= true;
			}else{
				$upload_media->image_y          = 30;
				$upload_media->image_ratio_x    = true;
				$upload_thumb->image_y          = 30;
				$upload_thumb->image_ratio_x    = true;
				$upload->image_x              	= 700;
				$upload->image_ratio_y       	= true;
			}
			$upload_media->Process('../../uploads/medias/');
			$upload_thumb->Process('../../uploads/thumbs/');
			$upload->Process('../../uploads/');
		}else{
			$msg_error = $upload_thumb->error;
			$error=true;
		}

		if($upload_media->processed && $upload->processed && $upload_thumb->processed){
			$img_name = $upload->file_dst_name;
			$upload_media-> Clean();
			$upload_thumb-> Clean();
			$upload-> Clean();
			$imgNova=true;
		}else{
			echo 'error : ' . $upload_thumb->error . '<br />';
			echo 'error : ' . $upload->error;
		}
	}else{
		$imgNova=false;
	}
}
$value;
if($error){
	header("Location: ../".$pagina.".php?msg=0");
}else{
	$rows = $value = null;
	if($pagina=="galerias"){
		$value = "titulo='".$titulo."', descricao='".$descricao."', imagem='".$img_name."', ativo=".$ativo;
	}else if($pagina=="fotos"){
		$value = "titulo='".$titulo."', descricao='".$descricao."', imagem='".$img_name."', ativo=".$ativo;
	}else if($pagina=="noticias"){
		$value = "titulo='".$titulo."', descricao='".$descricao."', imagem='".$img_name."', ativo=".$ativo;
	}else if($pagina=="slider"){
		$value = "titulo='".$titulo."', descricao='".$descricao."', imagem='".$img_name."', link='".$link."' ativo=".$ativo;
	}
	//"UPDATE ".$table." SET ".$rowsAndValues." WHERE ".$where;
	
	//$retorno = $db->create($pagina, $rows, $value);
	$retorno = $db->update($pagina, $value, "id=".$id);
	if(!$retorno){
		header("Location: ../".$pagina.".php?msg=0");
	}
	if($imgNova){
		unlink("../../uploads/thumbs/".$img_atual);
		unlink("../../uploads/medias/".$img_atual);
		unlink("../../uploads/".$img_atual);
		header("Location: ../".$pagina.".php?msg=3");
	}
	header("Location: ../".$pagina.".php?msg=1");
}