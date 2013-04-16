function showBox(idProduto){
	 $('#box_'+idProduto).slideDown('slow');
}
function hideBox(idProduto){
	 $('#box_'+idProduto).slideUp('slow');
}

function adicionarFoto(urlExibicao, urlImpressao, nrFotos){
	fotosEscolhidas = verificaNrFotosEscolhidas();
	if(fotosEscolhidas < parseInt(nrFotos)){
		inputFotos = document.getElementById('urlFotos');
		if(fotosEscolhidas == 0){
			inputFotos.value = urlImpressao;
		}else{
			inputFotos.value = inputFotos.value+";"+urlImpressao;
		}
		var idFoto = new Date().getTime();
		$('#selecaoFotos').prepend('<img src="'+urlExibicao+'" alt="" onclick="removerFoto(\''+idFoto+'\',\''+urlImpressao+'\')" id="foto_'+idFoto+'">');
		$('#count').html(fotosEscolhidas+1);
	}else{
		alert("Número máximo de fotos para este produto já foi atingido");
	}
}

function removerFoto(idFoto, urlImpressao){
	fotosEscolhidas = verificaNrFotosEscolhidas();
	
	inputFotos = document.getElementById('urlFotos');
	
	if(fotosEscolhidas == 1){
		inputFotos.value = '';
	}else{
		var arrFotos = inputFotos.value.split(";");
		for(i=0;i<=arrFotos.length-1;i++){
			if(arrFotos[i] == urlImpressao){
				arrFotos.splice(i, 1);
				break;
			}
		}
		inputFotos.value = arrFotos.join(";");
	}
	$('#foto_'+idFoto).remove();
	$('#count').html(fotosEscolhidas-1);
}

function verificaNrFotosEscolhidas(){
	var fotos = $('#urlFotos').val();
	if(fotos == ''){
		nrFotos = 0;
	}else{
		var arrFotos = fotos.split(";");
		nrFotos =  arrFotos.length;
	}
	return nrFotos;
}