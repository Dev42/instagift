<?php
session_start();
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';
include_once '../processaPagamento.php';

$chart = new Chart();
$chtController = new ChartController();

$ped = new Pedidos();
$pedController = new PedidosController();

$ped->setNome($_POST['nome']." ".$_POST['sobrenome']);
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
$ped->setDescCupom($_SESSION['InstagiftCupomDesconto']);
$ped->setCodigoCupom($_SESSION['InstagiftCodigoCupom']);
$ped->setPeso($_SESSION['InstagiftPesoTotal']);
//1 para Sedex, 2 para PAC
if($_SESSION['InstagiftTipoEntrega'] == 'pac'){
	$ped->setFrete(2);
}else{
	$ped->setFrete(1);
}
$ped->setStatus(1);
$ped->setStatusPag(1);
$ped->setPayMode("PAGSEGURO");
$ped->setCreatedAt(time()-18000);

$pedId = $pedController->insertAction($ped);
$ped->setId($pedId);
if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
    $username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
    $origem = '1';
}else if ($_SESSION['InstagiftTipoLogin'] == 'Fb'){
    $username = ($_SESSION['InstagiftDadosUserFb']['username']);
    $origem = '2';
}else{
	$username = $_SESSION['UserNameInstagift'];
	$origem = '3';
}

$status = '1';
$chartAction = new ChartController();
$chartProducts = $chartAction->listActionChart($username, $origem, $status);
foreach($chartProducts as $k => $v){
        $chart = new Chart();
	$objFixed = $chart->fetchEntity($v);
	$objFixed->setPedId($pedId);
	$objFixed->setStatus(2);
	$chtController->editAction($objFixed);
}
$procPag = new processaPagamento();
$procPag->main($ped);

?>