<?php
session_start();
include_once '../config/connection.php';
include_once '../painel/conf/classLoader.php';
$valor = 0;
$peso = 0;

foreach ($_SESSION['InstagiftCarrinho'] as $kChart => $vChart) {
	$obj = unserialize($vChart);
	$peso = $peso + $obj->getPeso();
	$valor = $valor + $obj->getValor();
}

$peso = number_format($peso,3,',','.');
$valor = number_format($valor,2,',','.');

$retorno = calculaFrete($_POST['cep'], $peso, $valor);

$retorno = $retorno."|".$peso."|".$valor;

$retArr = explode("|", $retorno);

echo $retArr[0]."|".number_format($retArr[4],2,',','.')."|".number_format($retArr[3],2,',','.')."|".$retArr[5]."|".$retArr[6];

?>