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
			<h3>Adicionar Slider</h3>
				<div class="row">
				<form name="form" action="includes/add.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="page" value="slider">
						<div class="row">
							<input type="text" name="titulo" id="slider-title" placeholder="Título" class="form-control">
						</div>

						<div class="row">
							<textarea type="text" name="descricao" id="slider-description" placeholder="Descrição" class="form-control"></textarea>
						</div>

						<div class="row">
							<input type="text" name="link" id="slider-link" placeholder="Link" class="form-control">
						</div>

						<div class="row">
							<div class="form-group">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<span class="btn btn-default btn-file">
										<span class="fileinput-new"><i class="fa fa-picture-o"></i> Escolher imagem</span>
										<span class="fileinput-exists btn-wide"><i class="fa fa-cog"></i> Alterar</span>
										<input type="file" name="imagem[]">
									</span>
									<span class="fileinput-filename"></span>
									<a href="#" class="close fileinput-exists icon-danger" data-dismiss="fileinput" style="float: none"> <i class="fa fa-times-circle"></i></a>
								</div>
							</div>
						</div>
					</form>
				</div>

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