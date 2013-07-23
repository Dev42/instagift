<?php
session_start();
include_once '../config/connection.php';
include_once '../painel/conf/classLoader.php';
$valor = 0;
$peso = 0;

if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
	$username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
	$origem = '1';
}else if ($_SESSION['InstagiftTipoLogin'] == 'Fb'){
	$username = ($_SESSION['InstagiftDadosUserFb']['username']);
	$origem = '2';
}else {
	$username = $_SESSION['UserNameInstagift'];
	$origem = '3';
}
$status = '1';

$chartAction = new ChartController();
$chartProducts = $chartAction->listActionChart($username, $origem, $status);

foreach ($chartProducts as $kChart => $vChart) {
	$peso = $peso + $vChart["cht_20_peso"];
	$valor = $valor + $vChart["cht_20_valor"];
}

$peso = number_format($peso,3,',','.');
$valor = number_format($valor,2,',','.');

$retorno = calculaFrete($_POST['cep'], $peso, $valor);

$retorno = $retorno."|".$peso."|".$valor;

$retArr = explode("|", $retorno);

echo $retArr[0]."|".number_format($retArr[4],2,',','.')."|".number_format($retArr[3],2,',','.')."|".$retArr[5]."|".$retArr[6];

?>