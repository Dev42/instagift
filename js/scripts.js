function showBox(idProduto){
	 $('.boxProdutos').slideUp('slow');
	 $('#box_'+idProduto).slideDown('slow');
}
function hideBox(idProduto){
	 $('#box_'+idProduto).slideUp('slow');
}

function adicionarFotoCaixa(urlExibicao, urlImpressao, tipodiv, margin){
	var nrFotosTampa = $('#nrFotosTampa').val();
	fotosEscolhidasTampa = verificaNrFotosEscolhidas('tampa');
	
	if(fotosEscolhidasTampa < parseInt(nrFotosTampa)){
		adicionarFoto(urlExibicao, urlImpressao, 'tampa', tipodiv, margin);
	}else{
		adicionarFoto(urlExibicao, urlImpressao, 'padrao', tipodiv, margin);
	}
}

function adicionarFoto(urlExibicao, urlImpressao, tipo, tipodiv,margin){
	if(tipodiv == "lar"){
		divcontainer = "<div class='containerLarFoto'>";
	}else if(tipodiv == "alt"){
		divcontainer = "<div class='containerAltFoto'>";
	}else{
		divcontainer = "<div class='containerQuadFoto'>";
	}
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
		
		$('#selecaoFotosTampa').prepend(divcontainer+'<img src="'+urlExibicao+'" alt="" style="margin-left:-'+margin+'px" onclick="removerFoto(\''+idFoto+'\',\''+urlImpressao+'\',\'tampa\')" id="foto_'+idFoto+'"></div>');
		
		$("#selecaoFotosTampa .spaceFoto:first").remove()
		
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

			$('#selecaoFotos').prepend(divcontainer+'<img src="'+urlExibicao+'" alt="" style="margin-left:-'+margin+'px" onclick="removerFoto(\''+idFoto+'\',\''+urlImpressao+'\',\'padrao\')" id="foto_'+idFoto+'"></div>');

			$("#selecaoFotos .spaceFoto:first").remove();
			
			$('#count').html(fotosEscolhidas+1);
			
			if(fotosEscolhidas+1 == parseInt(nrFotos)){
				$('#btn-comprar').show();
				$('#frasesCool').show();
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
		$('#foto_'+idFoto).parent('div').remove();
		$('#selecaoFotosTampa').append("<div class='spaceFoto'></div>");
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
		$('#foto_'+idFoto).parent('div').remove();
		$('#selecaoFotos').append("<div class='spaceFoto'></div>");
		$('#count').html(fotosEscolhidas-1);
	}
	$('#frasesCool').hide();
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
	nrFotosAtual = parseInt($('#nrFotos').val());
	
	if(nrFotosAtual < nrFotosEscolhido){
		$('#selModelo').val(idEscolhido);
		$('#nrFotos').val(nrFotosEscolhido);
		$('#txtNrFotos').html(nrFotosEscolhido);
		
		diferencaFotos = nrFotosEscolhido - nrFotosAtual;
		for(i=1;i<=diferencaFotos;i++){
			$('#selecaoFotos').append("<div class='spaceFoto'></div>");
		}
		$('#btn-comprar').hide();
	}else if(nrFotosEscolhido < nrFotosAtual){
		$('#selModelo').val(idEscolhido);
		$('#nrFotos').val(nrFotosEscolhido);
		$('#txtNrFotos').html(nrFotosEscolhido);
		$('#count').html('0');
		
		$('#selecaoFotos').empty();
		for(i=1;i<=nrFotosEscolhido;i++){
			$('#selecaoFotos').append("<div class='spaceFoto'></div>");
		}
		$('#urlFotos').val('');
		$('#btn-comprar').hide();
	}else{
		$('#selModelo').val(idEscolhido);
	}
}

function selecionaNrFotosTampa(elemento,opcaoEscolhida){
        if(opcaoEscolhida != $('#nrFotosTampa').val()){
                if(opcaoEscolhida == 1){
                        $('#selecaoFotosTampa').empty();
						$('#selecaoFotosTampa').append("<div class='spaceFoto'></div>");
                        $('#urlFotosTampa').val('');
                }else{
                	$('#selecaoFotosTampa').append("<div class='spaceFoto'></div><div class='spaceFoto'></div><div class='spaceFoto'></div>");
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
			beforeSend: function(){
				$("#loadingCep").html("<img src='images/site/ajax-loader.gif' alt='Carregando' />");
			},
            data: { cep: cep }
        }).done(function(html){
            retorno = html.split("|");
			if (retorno[0] == 'ok'){
				$("#loadingCep").html("");
				$("#opcoesFrete").show();
				$("#valorCepPac").html("PAC - R$ "+retorno[1]);
				$("#valorCepSedex").html("Sedex - R$ "+retorno[2]);
			}else {
				$("#loadingCep").html("");
				$("#opcoesFrete").show();
				$("#opcoesFrete").html("-");
				alert("Ocorreu um erro");    
			}
        });
    }
}

function verificarCupom(){
	$.ajax({
		type: 'POST',
		url: 'process/processAjaxCupom.php',
		beforeSend: function(){
			$("#loadingCupom").html("<img src='images/site/ajax-loader.gif' alt='Carregando' />");
		},
		data: { codigoCupom: $("#codigoCupom").val() }
	}).done(function(html){
		retorno = html.split("|");
		if (retorno[0] == 'ok'){
			$("#loadingCupom").html("");
			$("#resultadoCupom").html("<span>"+retorno[1]+"% de desconto</span>");
		}else {
			$("#loadingCupom").html("");
			$("#resultadoCupom").html("<span>Cupom inválido</span>"); 
		}
	});
}

function validaCarrinho(){
	cep = $("#cepCliente").val();
	ssnRegExp = /^\d{5}-\d{3}$/;
	
	radios = document.getElementsByName('optFrete');
	freteEscolhido = false;
	
	for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			freteEscolhido = true
		}
	}
	
    if(!ssnRegExp.test(cep)){
        alert("Preencha o CEP corretamente");
		return false;
	}
	if(!freteEscolhido){
		alert("Selecione o tipo de entrega");
		return false;
	}
	document.carrinhoForm.submit();
}

function validaFormPedido(){
    if($("#nome").val() == ''){
		alert("Preencha o nome");
		return false;
	}
	if($("#email").val() == ''){
		alert("Preencha o e-mail");
		return false;
	}
	if($("#ddd").val() == ''){
		alert("Preencha o DDD");
		return false;
	}
	if($("#telefone").val() == ''){
		alert("Preencha o telefone");
		return false;
	}
	if($("#cidade").val() == ''){
		alert("Preencha a cidade");
		return false;
	}
	if($("#estado").val() == ''){
		alert("Preencha o estado");
		return false;
	}
	if($("#endereco").val() == ''){
		alert("Preencha o endereço");
		return false;
	}
	if($("#numero").val() == ''){
		alert("Preencha o número");
		return false;
	}
	if($("#bairro").val() == ''){
		alert("Preencha o bairro");
		return false;
	}
	document.contatoForm.submit();
}

function validaFormContato(){
    if($("#nome").val() == ''){
		alert("Preencha o nome");
		return false;
	}
	if($("#email").val() == ''){
		alert("Preencha o e-mail");
		return false;
	}
	if($("#telefone").val() == ''){
		alert("Preencha o telefone");
		return false;
	}
	if($("#mensagem").val() == ''){
		alert("Preencha a mensagem");
		return false;
	}
	document.contatoForm.submit();
}
function validaCompra(){
    if($("#selCor").val() == ''){
		alert("Selecione a cor que deseja o produto");
		return false;
	}
	document.comprarForm.submit();
}

function iniciaFrasesCool(){
	$(".modeloFraseCool").removeClass('active');
	$('#blockAction').remove();
	$('#selecaoFotos').fadeTo('slow',1);
	
	$("#fotosFrasesCool").html($("#selecaoFotos").html().replace(/removerFoto\(/g,"selFotoFrasesCool(this,"));
	verificarFraseFeita();
	
	$('#selecaoFotos').fadeTo('slow',.6);
	$('#selecaoFotos').append('<div id="blockAction" style="position: relative;top:0;left:0;width: 100%;height:100%;z-index:2;opacity:0.4;filter: alpha(opacity = 50)"></div>');
	$('.row.dica.opCompra').append('<div id="blockActionOpcoes" style="position: relative;top:0;left:0;width: 100%;height:100%;z-index:2;opacity:0.4;filter: alpha(opacity = 50)"></div>');
	$("#headerPasso1").show(0);
	$("#headerPasso2").hide(0);
	$("#headerPasso3").hide(0);
	$(".footerPasso1").hide(0);
	$(".footerPasso2").hide(0);
	$(".footerPasso3").hide(0);
	$("#fotoCool").empty();
	$("#fotoCool").css('border','none');
	$('#frasesCoolModal').modal('show');
}

function selFotoFrasesCool(element, id, urlImagem, tipo){
	var classe = $(element).closest('div').attr('class');
	$(".fotoCool").css('border','2px solid #FFFFFF');
	if(classe == "containerQuadFoto"){
		$("#fotoCool").html("<img src='"+urlImagem+"' style='width:300px; height:300px;'>");
	}else if(classe == "containerAltFoto"){
		$("#fotoCool").html("<img src='"+urlImagem+"' style='width:300px;'>");
	}else{
		var marginLeft = parseInt($(element).css('margin-left').replace('px','')) * 7;
		$("#fotoCool").html("<img src='"+urlImagem+"' style='margin-left:"+marginLeft+"px; height:300px; max-width:none !important;'>");
	}
	$("#idFotoCool").val(id);
	$("#urlFotoCool").val(urlImagem);
	$(".modal-footer").show();
	$(".footerPasso1").show(0);
}

function voltarPasso1FraseCool(){
	$("#headerPasso1").show(0);
	$("#headerPasso2").hide(0);
	$(".footerPasso1").show(0);
	$(".footerPasso2").hide(0);
	$("#fraseCoolEditada").remove();
}

function voltarPasso2FraseCool(){
	$("#headerPasso3").hide(0);
	$("#headerPasso2").show(0);
	$(".footerPasso3").hide(0);
	$(".footerPasso2").show(0);
	$("#fraseCoolEditada").css('border','1px dashed #ffffff');
	$("#fraseCoolEditada").draggable({disabled: false });
	$("#imagemFraseCool").resizable({disabled: false });
}

function avancaPasso2FraseCool(){
	$("#headerPasso1").hide(0);
	$("#headerPasso2").show(0);
	$(".footerPasso1").hide(0);
	$(".footerPasso2").show(0);
}

function avancaPasso3FraseCool(){
	$("#headerPasso2").hide(0);
	$("#headerPasso3").show(0);
	$(".footerPasso2").hide(0);
	$(".footerPasso3").show(0);
	$("#fraseCoolEditada").css('border','none');
	$("#fraseCoolEditada").draggable({disabled: true});
	$("#imagemFraseCool").resizable({disabled: true});
}

function adicionaFraseCool(id, url){
	$(".modeloFraseCool").removeClass('active');
	$("#modeloFrase_"+id+".modeloFraseCool").addClass('active');
	
	$("#fraseCoolEditada").remove();
	$("#fotoCool").append("<div id='fraseCoolEditada' style='cursor:move; display:inline-block; border:1px dashed #ffffff;'><img src='images/uploads/frases/"+url+"' id='imagemFraseCool' style='width:280px;'></div>");
	
	$("#fraseCoolEditada").draggable({ containment: "#fotoCool", drag: function( event, ui ){atualizaPosDimFraseCool()} });
	$("#imagemFraseCool").resizable({ containment: "#fotoCool", aspectRatio: true, resize: function( event, ui ){atualizaPosDimFraseCool()} });
	$("#idFraseCool").val(id);
	$("#posFraseCool").val("10,0");
	$("#dimFraseCool").val("280");
	$(".footerPasso2 .btnDir").show(0);
}

function atualizaPosDimFraseCool(){
	var dimensao = parseInt($("#imagemFraseCool").css('width').replace('px',''));
	var posicaoLeft = parseInt($("#fraseCoolEditada").css('left').replace('px','')) - 117;
	var posicaoTop = parseInt($("#fraseCoolEditada").css('top').replace('px','')) - 2;
	
	$("#posFraseCool").val(posicaoLeft+","+posicaoTop);
	$("#dimFraseCool").val(dimensao);
}

function finalizarFrase(){
	var idFotoCool = $("#idFotoCool").val();
	var urlFotoCool = $("#urlFotoCool").val();
	var idFraseCool = $("#idFraseCool").val();
	var posFraseCool = $("#posFraseCool").val();
	var dimFraseCool = $("#dimFraseCool").val();
	
	$('#frasesCool').append('<input type="hidden" id="fotoCool_'+idFotoCool+'" name="fotosCool[]" value="'+idFotoCool+';'+urlFotoCool+';'+idFraseCool+';'+posFraseCool+';'+dimFraseCool+'" />');
	
	$('#frasesCoolModal').modal('hide');
}

function salvarNovaFraseCool(){
	var idFotoCool = $("#idFotoCool").val();
	var urlFotoCool = $("#urlFotoCool").val();
	var idFraseCool = $("#idFraseCool").val();
	var posFraseCool = $("#posFraseCool").val();
	var dimFraseCool = $("#dimFraseCool").val();
	
	$('#frasesCool').append('<input type="hidden" id="fotoCool_'+idFotoCool+'" name="fotosCool[]" value="'+idFotoCool+';'+urlFotoCool+';'+idFraseCool+';'+posFraseCool+';'+dimFraseCool+'" />');
	
	verificarFraseFeita();
	
	$(".modeloFraseCool").removeClass('active');
	$("#headerPasso1").show(0);
	$("#headerPasso2").hide(0);
	$("#headerPasso3").hide(0);
	$(".footerPasso1").hide(0);
	$(".footerPasso2").hide(0);
	$(".footerPasso3").hide(0);
	$("#fotoCool").empty();
	$("#fotoCool").css('border','none');
}

function verificarFraseFeita(){
	var idsFotosUsadas = new Array();
	$("input[name='fotosCool[]']").each(function(){
		valuesInput = $(this).val().split(';');
		idsFotosUsadas.push(valuesInput[0]);
	});
	
	$("#fotosFrasesCool img").each(function (){
		idFotoCru = $(this).attr('id');
		idFoto = idFotoCru.replace('foto_','');
		for(j=0;j<idsFotosUsadas.length;j++){
			if(idFoto == idsFotosUsadas[j]){
				$(this).closest('div').remove();
			}
		}
	});
}