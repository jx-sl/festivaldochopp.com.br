<?php
require'../classes/class.upload/class.upload.php';
require '../classes/dataBaseClass.php';
$msgId = "0";
$valid_formats = array("jpg", "png", "gif", "bmp", "JPG");
$max_file_size = 1024*10000; //100 kb
$path = "../../uploads/"; // Upload directory
$size = 0;
$idGaleria=-1;
$ativo=1;
if(isset($_POST['galeria'])) $idGaleria = $_POST['galeria'];

$db = new Database();
if($db->connect()){
	$db->selectDb();
}else{
	$msgId=1;
}
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {
		if ($_FILES['files']['error'][$f] == 4) {
			$msgId="3";
			continue; // Skip file if any error found
		}
		if ($_FILES['files']['error'][$f] == 0) {
			if ($_FILES['files']['size'][$f] > $max_file_size) {
				//$message[] = "$name is too large!.";
				$msgId = "5"; break;//continue; // Skip large files
			}elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				//$message[] = "$name is not a valid format";
				$msgId = "6"; break;//continue; // Skip invalid file formats
			}
			else{ // No error found! Move uploaded files

				$img_w="1";
				$img_h="0";
				$img_name = "";
				// SE TIVER IMAGEM FAZ O UPLOAD
				if($_FILES["files"]["tmp_name"][$f] != ""){
					$img_size = getimagesize($_FILES["files"]["tmp_name"][$f]);
					$img_w = $img_size[0];
					$img_h = $img_size[1];
					$new_img = true;
				
					$upload_thumb = new Upload($_FILES["files"]["tmp_name"][$f]);
					$upload = new Upload($_FILES["files"]["tmp_name"][$f]);
					$upload_media = new Upload($_FILES["files"]["tmp_name"][$f]);
				
					if ($upload_thumb->uploaded && $upload->uploaded && $upload_media->uploaded){
						$upload_media->file_new_name_body	= "festivalchopp";
						$upload_thumb->file_new_name_body	= "festivalchopp";
						$upload->file_new_name_body   		= "festivalchopp";
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
					}else{
						echo 'error : ' . $upload_thumb->error . '<br />';
						echo 'error : ' . $upload->error;
					}
					$retorno = $db->create("fotos", "imagem, descricao, id_galeria, ativo", "'$img_name', 'imagem', '$idGaleria', $ativo");
					if($retorno=="erro"){
						unlink("../../uploads/thumbs/".$imagem);
						unlink("../../uploads/medias/".$imagem);
						unlink("../../uploads/".$imagem);
					}else{
						$size++;
					}
				}
			}
		}else{			
			$msgId="4"; break;
		}
	}//end foreach
}else{
	$msgId=2;
}
header("Location: ../fotos.php?msg=".$msgId."&size=".$size);