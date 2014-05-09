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
			<h3>Notícias</h3>
			<div class="row">
				<table class="table">
					<colgroup>
            <col>
            <col width="65">
            <col width="65">
            <col width="65">
          </colgroup>
					<thead>
						<tr>
							<th>Título</th>
							<th>Ativar</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
					<?php
					include 'classes/pageClass.php';
					$page= new Page();
					$dados = $page->getPageContent("*", "noticias", null);
					$out;
					//print $dados;
					if(gettype($dados)!="array"){
						$out = "<tr><td colspan='5'>Não existem notícias cadastradas.</td></tr>";
					}else{
						$out="";
						foreach($dados as $arrayItem) {
							$out .='
							<tr>
								<td>'.$arrayItem["titulo"].'</td>
								<td class="center">
									<label class="checkbox checked" onclick="#" >
										<a onclick="return confirm(\'Voce tem certeza que deseja desativar o item selecionado?\');" href="includes/deactivate.php?pg=noticias&id='.$arrayItem["id"].'" class="icon-primary">
										<input type="checkbox" value="" id="checkbox'.$arrayItem["id"].'" data-toggle="checkbox">
									</label>
								</td>
								<td class="center"><a href="noticias-edit.php?id='.$arrayItem["id"].'" class="icon-primary"><i class="fa fa-lg fa-pencil-square"></i></a></td>
							<td class="center"><a onclick="return confirm(\'Voce tem certeza que deseja excluir o item selecionado?\');" href="includes/delete.php?pg=noticias&id='.$arrayItem["id"].'" class="icon-danger"><i class="fa fa-lg fa-minus-square"></i></a></td>
						</tr>';
						}
					}
					print $out;
					?>
					</tbody>
				</table>
			</div>

			<div class="row">
				<a href="noticias-add.php" class="btn btn-wide btn-info pull-right"><span><i class="fa fa-plus-circle"></i></span> Adicionar</a>
			</div>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
		
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>