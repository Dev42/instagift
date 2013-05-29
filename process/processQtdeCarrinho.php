<?php
session_start();
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';
$idItem = $_POST['idItem'];
$quantidade = $_POST['quantidade'];
$action = $_POST['action'];
$status = 'erro';

if($action == 'add'){
   $quantidade++; 
}else{
	$quantidade--;
}
if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
    $username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
    $origem = '1';
}else {
    $username = ($_SESSION['InstagiftDadosUserFb']['username']);
    $origem = '2';
}
$status = '1';
$chartAction = new ChartController();
$chartProducts = $chartAction->listActionChart($username, $origem, $status, $idItem);
foreach ($chartProducts as $kChart => $vChart) {
        $chart = new Chart();
	$obj = $chart->fetchEntity($vChart);
	if ($obj->getId() == $idItem) {
		$pesoAtual = $obj->getPeso();
		$quantidadeAtual = $obj->getQuantidade();
		$valor = $obj->getValor();
		$pesoUnid = $pesoAtual/$quantidadeAtual;
		$pesoFinal = $pesoUnid*$quantidade;
		$valorUnid = $valor/$quantidadeAtual;
		$valorFinal = $valorUnid*$quantidade;
		$obj->setPeso($pesoFinal);
		$obj->setValor(number_format($valorFinal,2,'.',','));
		$obj->setQuantidade($quantidade);
		$chartAction->editAction($obj);
		$status = 'ok';
	}
} 

if($status == 'ok'){
	echo "ok:".$quantidade.":".number_format($valorFinal,2,',','.');
}else{
	echo "erro:";
}
?>