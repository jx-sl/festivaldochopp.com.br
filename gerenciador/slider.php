<?php include_once 'includes/session.php'; ?>
<!doctype html>
<html lang="pt-br">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
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
			<h3>Slider</h3>
			<div class="row">
				<table class="table">
					<colgroup>
						<col width="120">
						<col>
						<col width="65">
						<col width="65">
						<col width="65">
					</colgroup>
					<thead>
						<tr>
							<th>Imagem</th>
							<th>Titulo</th>
							<th>Ativar</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
					<?php
						include 'classes/pageClass.php';
						$page= new Page();
						$dados = $page->getPageContent("*", "slider", null);
						$out;
						//print $dados;
						if(gettype($dados)!="array"){
							$out = "<tr><td colspan='5'>Não existem sliders cadastrados.</td></tr>";
						}else{
							$out="";
							foreach($dados as $arrayItem) {
								$out .='<tr>
										<td><img src="../uploads/thumbs/'.$arrayItem["imagem"].'" width="100" height="30"></td>
										<td>'.$arrayItem["titulo"].'</td>
										<td class="center">
											<label class="checkbox checked">
												<input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
											</label>
										</td>
											
										<td class="center">
											<a href="slider-edit.php?id='.$arrayItem["id"].'" class="icon-primary"><i class="fa fa-lg fa-pencil-square"></i></a>
										</td>
										<td class="center">
											<a onclick="return confirm(\'Você tem certeza que deseja excluir o item selecionado?\');" href="includes/delete.php?pg=slider&id='.$arrayItem["id"].'" class="icon-danger">
										<i class="fa fa-lg fa-minus-square"></i>
										</td>
									</tr>';
							} //end foreach
						}
						print $out;
						?>					
					</tbody>
				</table>
			</div>

			<div class="row">
				<!-- s贸 mostrar se tiver mais que uma p谩gina -->

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
				<a href="slider-add.php" class="btn btn-wide btn-info pull-right"><span><i class="fa fa-plus-circle"></i></span> Adicionar</a>
			</div>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
		
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>