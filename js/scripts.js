function showBox(idProduto){
	 $('.boxProdutos').slideUp('slow');
	 $('#box_'+idProduto).slideDown('slow');
}
function hideBox(idProduto){
	 $('#box_'+idProduto).slideUp('slow');
}

function adicionarFotoCaixa(urlExibicao, urlImpressao){
	var nrFotosTampa = $('#nrFotosTampa').val();
	fotosEscolhidasTampa = verificaNrFotosEscolhidas('tampa');
	
	if(fotosEscolhidasTampa < parseInt(nrFotosTampa)){
		adicionarFoto(urlExibicao, urlImpressao, 'tampa');
	}else{
		adicionarFoto(urlExibicao, urlImpressao, 'padrao');
	}
}

function adicionarFoto(urlExibicao, urlImpressao, tipo){
	if(tipo == 'tampa'){
		nrFotosTampa = $('#nrFotosTampa').val();
		fotosEscolhidasTampa = verificaNrFotosEscolhidas('tampa');
		
		nrFotos = $('#nrFotos').val();
		fotosEscolhidas = verificaNrFotosEscolhidas('padrao');
		
		inputFotos = document.getElementById('urlFotosTampa');
		if(fotosEscolhidasTampa == 0){
			inputFotos.value = urlImpressao;
		}else{
			inputFotos.value = inputFotos.value+";"+urlImpressao;
		}
		var idFoto = new Date().getTime();
		$('#selecaoFotosTampa').prepend('<img src="'+urlExibicao+'" alt="" onclick="removerFoto(\''+idFoto+'\',\''+urlImpressao+'\',\'tampa\')" id="foto_'+idFoto+'">');
		$('#countTampa').html(fotosEscolhidasTampa+1);
		
		if(fotosEscolhidas == parseInt(nrFotos) && fotosEscolhidasTampa+1 == parseInt(nrFotosTampa)){
			$('#btn-comprar').show();
		}
	
	}else{
		nrFotos = $('#nrFotos').val();
		fotosEscolhidas = verificaNrFotosEscolhidas('padrao');
		if(fotosEscolhidas < parseInt(nrFotos)){
			inputFotos = document.getElementById('urlFotos');
			if(fotosEscolhidas == 0){
				inputFotos.value = urlImpressao;
			}else{
				inputFotos.value = inputFotos.value+";"+urlImpressao;
			}
			var idFoto = new Date().getTime();
			$('#selecaoFotos').prepend('<img src="'+urlExibicao+'" alt="" onclick="removerFoto(\''+idFoto+'\',\''+urlImpressao+'\',\'padrao\')" id="foto_'+idFoto+'">');
			$('#count').html(fotosEscolhidas+1);
			
			if(fotosEscolhidas+1 == parseInt(nrFotos)){
				$('#btn-comprar').show();
			}
			
		}else{
			alert("Número máximo de fotos para este produto já foi atingido");
		}
	}
}

function removerFoto(idFoto, urlImpressao, tipo){
	if(tipo == 'tampa'){
		fotosEscolhidas = verificaNrFotosEscolhidas('tampa');
		inputFotos = document.getElementById('urlFotosTampa');
		
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
		$('#countTampa').html(fotosEscolhidas-1);
	}else{
		fotosEscolhidas = verificaNrFotosEscolhidas('padrao');
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
	$('#btn-comprar').hide();
}

function verificaNrFotosEscolhidas(tipo){
	if(tipo == "tampa"){
		fotos = $('#urlFotosTampa').val();
	}else{
		fotos = $('#urlFotos').val();
	}
	
	if(fotos == ''){
		totFotos = 0;
	}else{
		var arrFotos = fotos.split(";");
		totFotos =  arrFotos.length;
	}
	return totFotos;
}

function selecionaCor(elemento,corEscolhida){
	$('.boxCorProd').removeClass('active');
	elemento.className += " active";
	$('#selCor').val(corEscolhida);
}

function selecionaOpcaoCompra(elemento,idEscolhido,nrFotosEscolhido){
	$('.contOpcaoModelo').removeClass('active');
	elemento.className += " active";
	
	$('#selModelo').val(idEscolhido);
	$('#nrFotos').val(nrFotosEscolhido);
	$('#txtNrFotos').html(nrFotosEscolhido);
	$('#count').html('0');
	
	$('#selecaoFotos').empty();
    $('#urlFotos').val('');
	
	$('#btn-comprar').hide();
}

function selecionaNrFotosTampa(elemento,opcaoEscolhida){
        if(opcaoEscolhida != $('#nrFotosTampa').val()){
                if(opcaoEscolhida == 1){
                        $('#selecaoFotosTampa').empty();
                        $('#urlFotosTampa').val('');
                }
                
                $('.boxNrFotosTampa').removeClass('active');
                elemento.className += " active";
                $('#nrFotosTampa').val(opcaoEscolhida);
                
                $('#btn-comprar').hide();
        }
}

function alteraQtde(idItem,action){
    quantidade = $("#quantidade_"+idItem).val();
    if(quantidade == '1' && action == 'rm'){
        alert("A quantidade mínima é uma unidade");
    }else{
        $.ajax({
            type: 'POST',
            url: 'process/processQtdeCarrinho.php',
            data: { idItem: idItem, quantidade : quantidade, action : action }
        }).done(function(html){
            retorno = html.split(":");
			if (retorno[0] == 'ok'){
				$("#quantidade_"+idItem).val(retorno[1]);
				$("#valor_"+idItem).html("R$ "+retorno[2]);
			}else {
				alert("Ocorreu um erro");    
			}
        });
    }    
}

function calcularCep(){
	cep = $("#cepCliente").val();
	ssnRegExp = /^\d{5}-\d{3}$/;
	
    if(!ssnRegExp.test(cep)){
        alert("Preencha o CEP corretamente");
	}else{
        $.ajax({
            type: 'POST',
            url: 'process/processAjaxFrete.php',
            data: { cep: cep }
        }).done(function(html){
            retorno = html.split("|");
			if (retorno[0] == 'ok'){
				$("#valor_cep").html("R$ "+retorno[3]);
			}else {
				alert("Ocorreu um erro");    
			}
        });
    }
}