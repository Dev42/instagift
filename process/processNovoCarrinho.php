<?php

session_start();
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';
include_once '../processaPagamento.php';

$chart = new Chart();
$ped = new Pedidos();
$pedController = new PedidosController();
$end = new Endereco();
$endController = new EnderecoController();
$cnt = new Contato();
$cntController = new ContatoController();

$chart->setCliId($_SESSION['IdInstagift']);
$chart->setPrdId($_POST['prdId']);
$chart->setPrdConfig($_POST['urlFotos']);
$chart->setQuantidade($_POST['quantidade']);
$chart->setCreatedAt(time());

$end->setClienteId($_SESSION['IdInstagift']);
$end->setEndereco($_POST['endereco']);
$end->setNumero($_POST['numero']);
$end->setBairro($_POST['bairro']);
$end->setComplemento($_POST['complemento']);
$end->setCidade($_POST['cidade']);
$end->setEstado($_POST['estado']);
$end->setCep($_POST['cep']);

$cnt->setClienteId($_SESSION['IdInstagift']);
$cnt->setTipo(1);
$cnt->setNome($_POST['nome']);
$cnt->setDdd($_POST['ddd']);
$cnt->setTel($_POST['telefone']);
$cnt->setEmail($_POST['email']);

$qry = "INSERT INTO `instagift`.`pedidos_chart` (`cht_10_id`, `user_10_id`, `produto_10_id`, `cht_35_config`, `cht_10_quantidade`, `cht_22_created_at`) VALUES ('', '".$chart->getCliId()."', '".$chart->getPrdId()."', '".$chart->getPrdConfig()."', '".$chart->getQuantidade()."', '".$chart->getCreatedAt()."');";
mysql_query($qry);
$chartId = mysql_insert_id();

$endController->insertAction($end);

$cntController->insertAction($cnt);

$ped->setChartId($chartId);
$ped->setStatus(1);
$ped->setStatusPag(1);
$ped->setPayMode("PAGSEGURO");
$ped->setCreatedAt(time());

$pedController->insertAction($ped);

$procPag = new processaPagamento();
$procPag->main($chart);

?>