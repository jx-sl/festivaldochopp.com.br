<?php
class Page{
	function getContent($pagina, $id){
		if(isset($id)){
			switch($pagina){
				case "noticias" : return self::getNoticiasContentById($id);
				case "slider" : return self::getNoticiasContentById($id);
				case "galerias" : return self::getNoticiasContentById($id);
				case "fotos" : return self::getNoticiasContentById($id);
			}
		}else{
			switch($pagina){
				case "noticias" : return self::getNoticiasContent();
				case "slider" : return self::getNoticiasContent();
				case "galerias" : return self::getNoticiasContent();
				case "fotos" : return self::getNoticiasContent();
			}
			
		}
	}
	function getPageContent($itens, $table, $where){
		require_once 'classes/dataBaseClass.php';
		$out=null;
		$db = new Database();
		if($db->connect()){
			$db->selectDb();
			$retorno = $db->read($itens, $table, $where);
			if($retorno=="erro"){
				$out = 1;
				$out="<tr><td colspan='5'>Ocorreu um erro ao carregar os dados</td><tr>";
			}else if($retorno=="zero"){
				$out = "<tr><td colspan='5'>Nenhum item cadastrado ate o momento!</td><tr>";
			}else{
				$numItens = count($retorno);
				if($numItens>0){
					$out = $retorno;	
				}else{
					$out = "<tr><td colspan='5'>Nenhum item cadastrado ate o momento</td><tr>";
				}
			}
		}else{
			$out="<tr><td colspan='5'>Ocorreu um erro ao conectar ao banco.</td><tr>";
		}
		return $out;		
	}
	private function getNoticiasContentById($id){
		$out="";
		$dados = self::getPageContent( "*", "noticias", "ativo=1 AND id=".$id);
		if (gettype ( $dados ) != "array") {
			$out .= "<p>Nenhuma notícia cadastrada com os dados informados.</p>";
		} else {
			foreach ( $dados as $arrayItem ) {
				$out .='<h4><span>'.date("d/m/Y", strtotime($arrayItem["data_criacao"])).' - </span>'.$arrayItem["titulo"].'</h4>
						<div class="row">
							<div class="col-xs-4"><img src="uploads/medias/' . $arrayItem ["imagem"] . '" width="270" height="180" class="image-border"></div>
							<div class="col-xs-8" style="text-align:left">'.$arrayItem["descricao"].'</div>
						</div>';
			} // end foreach
		}
		$out .='<br><hr class="hr"><br>
				<div class="row">
					<div class="col-xs-12">
						<h5>Outras notícias:</h5>';
		$dadosInt = self::getPageContent( "*", "noticias", "ativo=1 AND id<>".$id);
		if (gettype ( $dadosInt ) != "array") {
			$out .= "<p>Nenhuma outra notícia cadastrada.</p>";
		} else {
			$out .= '<ul>';
			foreach ( $dadosInt as $arrayItem ) {
				$out .='<li>
							<a href="noticias.php?id=' . $arrayItem ["id"] . '">
								<span>' . date ( "d/m/Y", strtotime ( $arrayItem ["data_criacao"] ) ) . ' -  </span>' . $arrayItem ["titulo"] . '
							</a>
						</li>';
			}
			$out .= '</ul>';
		}
		$out .= '</div></div>';
		return $out;
	}
	private function getNoticiasContent(){
		$out="";
		$dados = self::getPageContent( "*", "noticias", "ativo=1" );
		if (gettype ( $dados ) != "array") {
			$out .= "<p>Nenhuma notícia cadastrada.</p>";
		} else {
			$out.='<div class="row"><div class="col-xs-12"><ul>';
			foreach ( $dados as $arrayItem ) {
				$out .= '<li>
							<a href="noticias.php?id=' . $arrayItem ["id"] . '">
								<span>' . date ( "d/m/Y", strtotime ( $arrayItem ["data_criacao"] ) ) . ' - </span>' . $arrayItem ["titulo"] . '
							</a>
						</li>';
			}
			$out .= '</ul></div></div>';
		}
		return $out;
	}
}