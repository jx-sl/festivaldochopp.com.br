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
			<h3>Adicionar Fotos</h3>
				<div class="row">
					<form name="form" action="includes/add.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="page" value="fotos">
						<div class="row">
							<div class="col-xs-5">
								<select id="selectGaleria" name="galeria">
								<?php
									include 'classes/pageClass.php';
									$page= new Page();
									$dados = $page->getPageContent("*", "galerias", null);
									$out;
									//print $dados;
									if(gettype($dados)!="array"){
										$out = "<option>Você não tem galerias.</option>";
									}else{
										$out='<option style="display:none">Selecione uma Galeria</option>';
										foreach($dados as $arrayItem) {
											$out.="<option value=\"".$arrayItem['id']."\">".$arrayItem['titulo']."</option>";
										}
									}
									print $out;
								?>
								</select>
							</div>
						</div>
						
						<div class="row">
							<input type="file" id="file" name="imagem[]" multiple="multiple" accept="image/*" />
						</div>
						<div class="row">
							<small>Utilize as teclas CTRL ou SHIFT para selecionar mais de uma imagem</small>
						</div>
						<ul id="lista"></ul>
					</form>
				</div>

				<div class="row">
					<a onclick="validaDados('fotos')" class="btn btn-wide btn-primary pull-right"><span><i class="fa fa-check-circle"></i></span> Salvar</a>
					<a href="fotos.php" class="btn btn-wide btn-danger pull-left"><span><i class="fa fa-times-circle"></i></span> Cancelar</a>
				</div>
			</div>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>