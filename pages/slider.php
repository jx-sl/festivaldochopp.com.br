<?php
function getPageContent($table, $where){
	$out="";
	include_once 'classes/dataBaseClass.php';
	$db = new Database($GLOBALS['DB_HOST'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
	$db->setDatabase($GLOBALS['DB_NAME']);
	if($db->connect()){
		$db->selectDb();
		$retorno = $db->read("*", $table, $where);
		//read($itens, $table, $where=null){
		if($retorno=="erro"){
			$out="<tr><td colspan='4'>Ocorreu um erro ao carregar os dados</td><tr>";
		}else{
			die($retorno);
			$numItens = count($retorno);
			if($numItens>0){
				$out = $retorno."zdfg";
			}else{
				$out = "<tr><td colspan='4'>Nenhum item cadastrado ate o momento</td><tr>";
			}
		}	
	}else{
		$out = "<tr><td colspan='4'>Ocorreu um erro ao acessar o banco de dados</td><tr>";
	}
	return $out;
	
}
function getViewContent($dados){
	$out="";
	foreach($dados as $arrayItem) {
		$out .=
		'<tr>
			<td>
				<img src="../uploads/thumbs/'.$arrayItem["imagem"].'" width="100" height="30">
			</td>
			<td>'.$arrayItem["titulo"].'</td>
			<td class="center">
				<label class="checkbox checked" onclick="confirma(\'deactivate\', \'table\', \'id\', \'value\')" >
					<input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
				</label>
			</td>
			<td class="center">
				<a href="?pg=slider&act=edit&oid='.$arrayItem["id"].'" class="icon-primary">
					<i class="fa fa-lg fa-pencil-square"></i>
				</a>
			</td>
			<td class="center">
				<a href="?pg=slider&act=delete&oid='.$arrayItem["id"].'" class="icon-danger">
					<i class="fa fa-lg fa-minus-square"></i>
				</a>
			</td>
		</tr>';
	}
	return $out;
}
function getEditContent($dados){
	//return var_dump($dados);
	$out="";
	foreach($dados as $arrayItem) {
		
		$out .='<div class="row">
					<form action="">
						<div class="row">
							<input type="text" id="slider-title" placeholder="'.$arrayItem["titulo"].'" class="form-control" value="'.$arrayItem["titulo"].'">
						</div>					
						<div class="row">
							<textarea type="text" id="slider-description" placeholder="'.$arrayItem["descricao"].'" class="form-control">'.$arrayItem["descricao"].'</textarea>
						</div>					
						<div class="row">
							<input type="text" id="slider-link" placeholder="'.$arrayItem["link"].'" value="'.$arrayItem["link"].'" class="form-control">
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
					<img src="../uploads/medias/'.$arrayItem["imagem"].'" width="300" height="90" alt="">
				</div>
					
				<div class="row">
					<label class="checkbox checked">Ativo
					<input type="checkbox" value="'.$arrayItem["ativo"].'" id="checkbox-ativo" data-toggle="checkbox">
					</label>
				</div>
					
				<div class="row">
					<a href="#" class="btn btn-wide btn-primary pull-right"><span><i class="fa fa-check-circle"></i></span> Salvar</a>
					<a href="slider.html" class="btn btn-wide btn-danger pull-left"><span><i class="fa fa-times-circle"></i></span> Cancelar</a>
				</div>';
	}
	return $out;
}


if(!isset($pageAction) || $pageAction=="view"){
		$pageContent = '				
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
							<tbody>'.getPageContent("view", null).'</tbody>
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
						<a href="?pg=slider&act=add" class="btn btn-wide btn-info pull-right"><span><i class="fa fa-plus-circle"></i></span> Adicionar</a>
					</div>';
}else{
	if($pageAction=="create" || $pageAction=="add"){
		$pageContent='
				
			<h3>Adicionar Slider</h3>
				<div class="row">
					<form action="">
						<div class="row">
							<input type="text" id="slider-title" placeholder="Título" class="form-control">
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
										<span class="fileinput-new"><i class="fa fa-picture-o"></i> Escolher imagem</span>
										<span class="fileinput-exists btn-wide"><i class="fa fa-cog"></i> Alterar</span>
										<input type="file" name="...">
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
					<a href="#" class="btn btn-wide btn-primary pull-right"><span><i class="fa fa-check-circle"></i></span> Salvar</a>
					<a href="slider.html" class="btn btn-wide btn-danger pull-left"><span><i class="fa fa-times-circle"></i></span> Cancelar</a>
				</div>
			</div>';
		
		
		
		
		
	}else if($pageAction=="update" ||$pageAction=="edit" || isset($pageActionId) ){		
		$pageContent = '<h3>Editar Slider</h3>'.getPageContent("edit", "id=1");		
		
	}else if($pageAction=="delete"){
		$pageContent = "<h3>Slider</h3><br><h4>Delete</h4>";
	}else if($pageAction=="activate"){
		$pageContent = "<h3>Activate</h4>";
	}else if($pageAction=="erro"){
		$pageContent = "<h3>Slider</h3><br><h4>Erro ao buscar conteudo da pagina.</h4>";
	}else{
		$pageContent = "<h3>Slider</h3><br><h4>Erro ao buscar conteudo da pagina.</h4>";
	}
}
	