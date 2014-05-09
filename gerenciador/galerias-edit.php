<?php
include_once 'includes/session.php';
if(!isset($_GET["id"])){
	header("Location: galerias.php?msg=0");
}
$id=$_GET["id"];
?>
<!doctype html>
<html lang="pt-br">
<head>
<?php include_once 'includes/head.php'; ?>
</head>
<body>
	<div class="top-bar">
	<?php include_once 'includes/header.php'; ?>
	</div> <!-- end top-bar -->

	<div class="wrapper">
		<div class="sidebar pull-left">
		<?php include_once 'includes/sidebar.php'; ?>
		</div> <!-- end sidebar -->

		<div class="main pull-left clearfix">
			<h3>Editar Galeria</h3>
				<div class="row">
					<form name="form" action="includes/edit.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="page" value="galerias">
						<input type="hidden" name="id" value="<?php print $id; ?>">
					
							<?php
							$img = null;
							include 'classes/pageClass.php';
							$page= new Page();
							$dados = $page->getPageContent("*", "galerias", "id=".$id);
							$out;
							//print $dados;
							if(gettype($dados)!="array"){
								$out = "<tr><td colspan='5'>Nao existem galerias cadastradas.</td></tr>";
							}else{
								$out="";
								foreach($dados as $arrayItem) {
									$out .=
									'<div class="row">
										<input type="text" name="titulo" id="galeria-title" class="form-control" value="'.$arrayItem["titulo"].'">
									</div>
			
									<div class="row">
										<textarea type="text" name="descricao" id="galeria-description" class="form-control">'.$arrayItem["descricao"].'</textarea>
									</div>
			
									<div class="row">
										<div class="form-group">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<span class="btn btn-default btn-file">
													<span class="fileinput-new"><i class="fa fa-picture-o"></i> Trocar imagem</span>
													<span class="fileinput-exists btn-wide"><i class="fa fa-cog"></i> Alterar</span>
													<input type="file" name="imagem">
												</span>
												<span class="fileinput-filename"></span>
												<a href="#" class="close fileinput-exists icon-danger" data-dismiss="fileinput" style="float: none"> <i class="fa fa-times-circle"></i></a>
											</div>
										</div>
									</div>';
									$img=$arrayItem["imagem"];
								}
								if($img!=null) print '<input type="hidden" name="img_atual" value="'.$img.'">';
							}
							print $out;
							?>						
					</form>
					<?php
					if($img!=null)
						print '<img src="../uploads/medias/'.$img.'" width="100" height="100" alt="">';
					?>
				</div>

				<div class="row">
					<label class="checkbox checked">Ativo
						<input type="checkbox" value="" id="checkbox-ativo" data-toggle="checkbox">
					</label>
				</div>

				<div class="row">
					<a onclick="submitForm()" class="btn btn-wide btn-primary pull-right"><span><i class="fa fa-check-circle"></i></span> Salvar</a>
					<a href="galerias.php" class="btn btn-wide btn-danger pull-left"><span><i class="fa fa-times-circle"></i></span> Cancelar</a>
				</div>
			</div>
		</div> <!-- end main -->
	 <!-- end wrapper -->
		
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>