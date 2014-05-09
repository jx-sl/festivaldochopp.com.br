var txtOut;

function confirma(action, table, id, value) {
    var txtConfirm;
    var txtReturn;
    if (action == "delete") {
        txtConfirm = "deletar";
        txtReturn = "deletado";
    }
    if (action == "activate") {
        txtConfirm = "ativar";
        txtReturn = "ativado";
    }
    if (action == "deactivate") {
        txtConfirm = "desativar";
        txtReturn = "desativado";
    }
    executarFuncao = confirm("Tem certeza que deseja " + txtConfirm + " o item selecionado?");
    txtOut = "O item foi " + txtReturn + " com sucesso!";
    if (executarFuncao)
        sendAjax(action, table, id, value);
    return false;
}

function sendAjax(action, table, id, value) {
    $.ajax({
        url: 'includes/'+action+'.php',
        method: 'POST',
        data: {
            action: action,
            table: table,
            id: id,
            value: value
        },
        statusCode: {
            404: function () {
                alert("page not found");
            }
        },
        success: function (valRet) {
            alert(valRet);
            if (valRet == "ok") {
                $("#" + id).remove();
                $("#alerta").remove();
                $("h3").after("<div id='alerta' class='row'><div class='alert alert-info alert-dismissable'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" +
                    txtOut + " " + valRet +
                    "</div>" +
                    "</div>");
            } else {
                alert(">>>" + valRet + "<<<<");
            }
            //alert("success!"+vari);
        }
    });
    return false;
}
$(function(){
	$('input#file').change(function(){
		var files = $("input#file")[0].files;
		for (var i = 0; i < files.length; i++)
		    $("ul#lista").append("<li>"+files[i].name+"</li>");
	});
});
function validaDados(pagina){
	if(pagina=="noticias" || pagina=="galeria"){
		if($("input#titulo").val()=="")
			return alert("Voce precisa preencher o titulo!");
		if($("textarea#descricao").val()=="")
			return alert("Voce precisa preencher a descricao!");
		if(pagina=="galeria" && $("input#file")[0].files.length<1)
			return alert("Voce precisa selecionar uma imagem!");
	}else if(pagina=="fotos"){
		if($("#selectGaleria").val() == "Selecione uma Galeria"){
			return alert("Selecione uma galeria!");
		}else if($("#selectGaleria").val() == "Você não tem galerias."){
			return alert("Você precisa criar uma galeria!");
		}else if($("input#file")[0].files.length<1){
			return alert("Você precisa selecionar ao menos uma foto.");
		}
	}
	submitForm();
}

function submitForm() {
    $("form").submit();
}