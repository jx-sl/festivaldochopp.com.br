<?php include_once 'includes/session.php'; ?>
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
			<h3>Editar Slider</h3>
				<div class="row">
				
				<form name="form" action="includes/edit.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="page" value="slider">
					<input type="hidden" name="id" value="<?php print $id; ?>">
					
							<?php
							$img = null;
							include 'classes/pageClass.php';
							$page= new Page();
							$dados = $page->getPageContent("*", "slider", "id=".$id);
							$out;
							//print $dados;
							if(gettype($dados)!="array"){
								$out = "<tr><td colspan='5'>Não existem sliders cadastrados.</td></tr>";
							}else{
								$out="";
								foreach($dados as $arrayItem) {
									$out .=
										'<div class="row">
											<input type="text" name="titulo" id="slider-title" class="form-control" value="'.$arrayItem["titulo"].'">
										</div>
				
										<div class="row">
											<textarea type="text" name="descricao" id="slider-description" class="form-control">'.$arrayItem["descricao"].'</textarea>
										</div>

										<div class="row">
											<input type="text" value="'.$arrayItem["descricao"].'" id="slider-link" name="link" placeholder="Link" class="form-control">
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
				
				
				<!--
					<form action="">
						<div class="row">
							<input type="text" id="slider-title" placeholder="Título" class="form-control" value="Lorem ipsum dolor sit amet">
						</div>

						<div class="row">
							<textarea type="text" id="slider-description" placeholder="Descrição" class="form-control"></textarea>
						</div>

						<div class="row">
							<input type="text" id="slider-link" placeholder="Link" class="form-control">
						</div>

						<div class="row">
							<div class="form-group">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<span class="btn btn-default btn-file">
										<span class="fileinput-new"><i class="fa fa-picture-o"></i> Trocar imagem</span>
										<span class="fileinput-exists btn-wide"><i class="fa fa-cog"></i> Alterar</span>
										<input type="file" name="...">
									</span>
									<span class="fileinput-filename"></span>
									<a href="#" class="close fileinput-exists icon-danger" data-dismiss="fileinput" style="float: none"> <i class="fa fa-times-circle"></i></a>
								</div>
							</div>
						</div>
					</form>
					<img src="http://lorempixel.com/300/90/sports/1/" width="300" height="90" alt="">
					-->
				</div> <!-- end row -->

				<div class="row">
					<label class="checkbox checked">Ativo
						<input type="checkbox" value="" id="checkbox-ativo" data-toggle="checkbox">
					</label>
				</div>

				<div class="row">
					<a onclick="submitForm()" class="btn btn-wide btn-primary pull-right"><span><i class="fa fa-check-circle"></i></span> Salvar</a>
					<a href="slider.php" class="btn btn-wide btn-danger pull-left"><span><i class="fa fa-times-circle"></i></span> Cancelar</a>
				</div>
			</div>
		</div> <!-- end main -->
	 <!-- end wrapper -->
		
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>