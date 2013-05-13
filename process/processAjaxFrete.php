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

$freteController = new FreteController();

$retorno = $freteController->calculaFrete($_POST['cep'], $peso, $valor);

echo $retorno."|".$peso."|".$valor;

?>