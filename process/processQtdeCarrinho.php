<?php
session_start();
include_once '../painel/conf/classLoader.php';
$idItem = $_POST['idItem'];
$quantidade = $_POST['quantidade'];
$action = $_POST['action'];
$status = 'erro';

if($action == 'add'){
   $quantidade++; 
}else{
	$quantidade--;
}

foreach ($_SESSION['InstagiftCarrinho'] as $kChart => $vChart) {
	$obj = unserialize($vChart);
	if ($obj->getIdLocal() == $idItem) {
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
		$_SESSION['InstagiftCarrinho'][$kChart] = serialize($obj);
		$status = 'ok';
	}
} 

if($status == 'ok'){
	echo "ok:".$quantidade.":".number_format($valorFinal,2,',','.');
}else{
	echo "erro:";
}
?>