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
			<h3>Adicionar Notícia</h3>
			<div class="row">
				<form name="form" action="includes/add.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="page" value="noticias">
					<div class="row">
						<input type="text" name="titulo" id="titulo" placeholder="Título" class="form-control">
					</div> <!-- end row -->

					<div class="row">
						<textarea type="text" name="descricao" id="descricao"	placeholder="Descrição" class="form-control"></textarea>
					</div>
					<div class="row">
						<input type="file" id="file" name="imagem[]"multiple="multiple" accept="image/*" />
					</div>
					<div class="row">	
						<select name="status">
							<option value="1" selected>Ativo</option>
							<option value="0">Inativo</option>
						</select>
					</div>
				</form>
			</div> <!-- end row -->
			<div class="row">
				<a onclick="validaDados('noticias')" class="btn btn-wide btn-primary pull-right"><span><i class="fa fa-check-circle"></i></span> Salvar</a>
				<a href="noticias.php" class="btn btn-wide btn-danger pull-left"><span><i class="fa fa-times-circle"></i></span> Cancelar</a>
			</div>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>