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
			<h3>Fotos</h3>
			<?php
				if(isset($_GET["msg"])){
					$size=" ";
					if(isset($_GET["size"])) $size.=$_GET["size"]." ";
					$msg;
					switch($_GET["msg"]){
						case 0 : $msg="Cadastro de".$size." itens executado com sucesso!"; break;
						case 1 : $msg="Erro ao selecionar o banco de dados!"; break;
						case 2 : $msg="Nao foram enviados arquivos!"; break;
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
							<th>Foto</th>
							<th>Galeria</th>
							<th>Ativar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
					<?php
					function validaCheck($status){
						if($status==1) return "checked";
					}
					include 'classes/pageClass.php';
					$page= new Page();
					$dados = $page->getPageContent("f.*, g.titulo grupo ", "fotos f, galerias g", "g.id=f.id_galeria");
					$out;
					//print $dados;
					if(gettype($dados)!="array"){
						$out = "<tr><td colspan='4'>Nao existem fotos cadastradas.</td></tr>";
					}else{
						$out="";
						foreach($dados as $arrayItem) {
							$out .=
							'<tr id="'.$arrayItem["id"].'">
								<td>
									<img src="../uploads/thumbs/'.$arrayItem["imagem"].'" width="60" height="40">
								</td>
								<td>'.$arrayItem["grupo"].'</td>
								<td class="center">
									<label class="checkbox" onclick="confirma(\'deactivate\', \'fotos\', \''.$arrayItem["id"].'\', \'value\')" >
										<input type="checkbox" name="ativo" value="" id="checkbox1" data-toggle="checkbox">
									</label>
								</td>
								<td class="center">
									<a onclick="return confirm(\'Voce tem ceteza que deseja excluir o item selecionado?\');" href="includes/delete.php?pg=fotos&id='.$arrayItem["id"].'" class="icon-danger">
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
				<a href="fotos-add.php" class="btn btn-wide btn-info pull-right"><span><i class="fa fa-plus-circle"></i></span> Adicionar</a>
			</div>
		</div> <!-- end main -->
	</div> <!-- end wrapper -->
		
	</div> <!-- end wrapper -->
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>