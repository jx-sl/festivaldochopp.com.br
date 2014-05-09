<?php
class MessageClass{

	function getMessage($id, $size=null) {
		switch($id){
			case 0 : return "Item adicionado com sucesso!"; break;
			case 1 : return "Item editado com sucesso!"; break;
			case 2 : return "Item excluido com sucesso!"; break;
			case 3 : return "Item atualizado com sucesso!"; break;
			case 4 : return "Existem arquivos com erros!"; break;
			case 5 : return "Nenhum arquivo selecionado!"; break;
			case 6 : return "Arquivo com formato invalido!"; break;
			case 7 : return "Ocorreu um erro. Tente Novamente!"; break;
			case 8 : return "Ocorreu um erro ao conectar ao banco de dados. Tente Novamente!"; break;
			case 4 : return "Formato de arquivo inválido!"; break;
			case 4 : return "Arquivo muito grande!"; break;
			case 4 : return "Existem arquivos com erros!"; break;
			case 4 : return "Nenhuma noticia cadastrada com os dados informados!"; break;
			Nenhuma outra noticia cadastrada.
		}
	}
}