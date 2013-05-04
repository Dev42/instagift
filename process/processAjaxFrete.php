<?php
include_once '../config/connection.php';

//Funcao para conexao aos correios com retorno modelo: sucesso|estado de destino|true para capital|valor sedex|valor pac
function CalculaFrete($cepOrigem, $cepDestino, $peso, $valor){
	$url = "https://pagseguro.uol.com.br/desenvolvedor/simulador_de_frete_calcular.jhtml?postalCodeFrom=".$cepOrigem."&weight=".$peso."&value=".$valor."&postalCodeTo=".$cepDestino;  
	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_URL, $url);  
	curl_setopt($ch, CURLOPT_VERBOSE, 1);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));  
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);  
	curl_setopt($ch, CURLOPT_POST, 0);  
	$result = curl_exec($ch);  
	$resultArray = curl_getinfo($ch);  
	curl_close($ch);
	
	return $result;
}

//informações processadas. Cep de Origem, Cep destino, Peso, Valor
$retorno = CalculaFrete("04516-001","02243-000", "1", 19 );
$retorno = explode("|",$retorno);

//enfim exibimos o valor de nossa encomenda…
if($retorno[0] == "ok"){
	echo "Valor Sedex: ".$retorno[3]."<br>";
	echo "Valor PAC: ".$retorno[4];
}else{
	echo "erro";
}
?>