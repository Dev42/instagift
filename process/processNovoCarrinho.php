<?php
session_start();
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';
include_once '../processaPagamento.php';

$chart = new Chart();
$chtController = new ChartController();

$ped = new Pedidos();
$pedController = new PedidosController();

$ped->setNome($_POST['nome']);
$ped->setEmail($_POST['email']);
$ped->setDdd($_POST['ddd']);
$ped->setTelefone($_POST['telefone']);
$ped->setLogradouro($_POST['endereco']);
$ped->setNumero($_POST['numero']);
$ped->setComplemento($_POST['complemento']);
$ped->setCep($_SESSION['InstagiftCepEntrega']);
$ped->setBairro($_POST['bairro']);
$ped->setCidade($_POST['cidade']);
$ped->setEstado($_POST['estado']);
$ped->setValorPedido($_SESSION['InstagiftTotalPedido']);
$ped->setValorFrete($_SESSION['InstagiftValorEntrega']);
$ped->setPeso($_SESSION['InstagiftPesoTotal']);
$ped->setFrete(1);
$ped->setStatus(1);
$ped->setStatusPag(1);
$ped->setPayMode("PAGSEGURO");
$ped->setCreatedAt(time());

$pedId = $pedController->insertAction($ped);

foreach($_SESSION['InstagiftCarrinho'] as $k => $v){
	$objFixed = unserialize($v);
	$objFixed->setPedId($pedId);
	
	$chtController->insertAction($objFixed);
}

$procPag = new processaPagamento();
$procPag->main($ped);

?>