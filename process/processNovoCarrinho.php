<?php

session_start();
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';
include_once '../processaPagamento.php';

$chart = new Chart();
$ped = new Pedidos();
$pedController = new PedidosController();

echo "<pre>";
print_r($_POST);
echo "</pre>";

$chart->setCliId($_SESSION['IdInstagift']);
$chart->setPrdId($_POST['prdId']);
$chart->setPrdConfig("");
$chart->setQuantidade(1);
$chart->setCreatedAt(time());

$qry = "INSERT INTO `instagift`.`pedidos_chart` (`cht_10_id`, `user_10_id`, `produto_10_id`, `cht_35_config`, `cht_10_quantidade`, `cht_22_created_at`) VALUES ('', '".$chart->getCliId()."', '".$chart->getPrdId()."', '', '1', '".$chart->getCreatedAt()."');";
mysql_query($qry);
$chartId = mysql_insert_id();

$ped->setChartId($chartId);
$ped->setStatus(1);
$ped->setStatusPag(1);
$ped->setPayMode("PAGSEGURO");
$ped->setCreatedAt(time());

if ($pedController->insertAction($ped)){
    echo "Pedido Criado Com Sucesso!";
}

$procPag = new processaPagamento();
$procPag->main($chart);

?>