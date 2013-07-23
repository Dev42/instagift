<?php

session_start();
error_reporting(E_ERROR);

include_once 'painel/conf/classLoader.php';
include_once 'config/connection.php';

if (isset($_GET['id']) && $_GET['id'] >= 1) {
    $chart = new Chart();
    $chart->setId($_GET['id']);
    $chartController = new ChartController();
    if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
        $username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
        $origem = '1';
    }else if ($_SESSION['InstagiftTipoLogin'] == 'Fb') {
        $username = ($_SESSION['InstagiftDadosUserFb']['username']);
        $origem = '2';
    }else{
		$username = $_SESSION['UserNameInstagift'];
        $origem = '3';
	}
		
    $status = '1';
    $chartProducts = $chartController->listActionChart($username, $origem, $status);
    $chartController->deleteAction($chart);
    if(count($chartProducts) == 1){
        $redirect = "index.php";
    }else{
        $redirect = "carrinho.php";
    }
    
    header("Location: ".$redirect);
}
?>