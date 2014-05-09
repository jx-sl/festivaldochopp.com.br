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
			<h3>Galerias</h3>
			<?php
				if(isset($_GET["msg"])){
					$size=" ";
					if(isset($_GET["size"])) $size.=$_GET["size"]." ";
					$msg;
					switch($_GET["msg"]){
						case 0 : $msg="Ocorreu um erro ao editar o item selecionado!"; break;
						case 1 : $msg="Item editado com sucesso!"; break;
						case 2 : $msg="Item salvo com sucesso!"; break;
						case 3 : $msg="Existem arquivos com erros ou nenhum arquivo foi selecionado!"; break;
						case 4 : $msg="Existem arquivos com erros!"; break;
						case 5 : $msg="Arquivos muito grandes!"; break;
						case 6 : $msg="Arquivo com formato invalido!"; break;
						case 7 : $msg="Arquivo vazio!"; break;
					}
					print "<div class='row'>
								<div class='alert alert-info alert-dismissable'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"
									.$msg."
								</div>
							</div>";
				}
			?>
			<div class="row">
				<table class="table">
					<colgroup>
				            <col width="80">
				            <col>
				            <col width="65">
				            <col width="65">
				            <col width="65">
	          			</colgroup>
					<thead>
						<tr>
							<th>Capa</th>
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
					$dados = $page->getPageContent("*", "galerias", null);
					$out;
					//print $dados;
					if(gettype($dados)!="array"){
						$out = "<tr><td colspan='5'>Não existem galerias cadastradas.</td></tr>";
					}else{
						$out="";
						foreach($dados as $arrayItem) {
							$out .=
							'<tr id="'.$arrayItem["id"].'">
								<td>
									<img src="../uploads/thumbs/'.$arrayItem["imagem"].'" width="100" height="30">
								</td>
								<td>'.$arrayItem["titulo"].'</td>
								<td class="center">
									<label class="checkbox checked" onclick="#" >
										<a onclick="return confirm(\'Voce tem certeza que deseja desativar o item selecionado?\');" href="includes/deactivate.php?pg=galerias&id='.$arrayItem["id"].'" class="icon-primary">
										<input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
									</label>
								</td>
								<td class="center">
									<a href="galerias-edit.php?id='.$arrayItem["id"].'" class="icon-primary">
										<i class="fa fa-lg fa-pencil-square"></i>
									</a>
								</td>
								<td class="center">
									<a onclick="return confirm(\'Voce tem certeza que deseja excluir o item selecionado?\nCaso existam fotos cadastradas para essa galeria elas também serão excluidas.\');" href="includes/delete.php?pg=galerias&id='.$arrayItem["id"].'" class="icon-danger">
										<i class="fa fa-lg fa-minus-square"></i>
									</a>
								</td>
							</tr>';
						}
					}
					print $out;
					?>
					</tbody>
				</table>
			</div>

			<div class="row">
				<!-- só mostrar se tiver mais que uma página -->

				<!-- ========== PAGINATION ========== -->
				<!-- <ul class="pagination-plain">
				  <li class="previous">
				    <a href="#"><i class="fa fa-chevron-left"></i></a>
				  </li>
				  <li class="active">
				    <a href="#">1</a>
				  </li>
				  <li class="next">
				    <a href="#"><i class="fa fa-chevron-right"></i></a>
				  </li>
				</ul> -->
        <!-- ========== END PAGINATION ========== -->
			</div>

			<div class="row">
				<a href="galerias-add.php" class="btn btn-wide btn-info pull-right"><span><i class="fa fa-plus-circle"></i></span> Adicionar</a>
			</div>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
		
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>