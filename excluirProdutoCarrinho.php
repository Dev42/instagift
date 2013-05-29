<?php

session_start();
error_reporting(E_ERROR);

include_once 'painel/conf/classLoader.php';

if (isset($_GET['id']) && $_GET['id'] >= 1) {
	if(count($_SESSION['InstagiftCarrinho']) == 1){
		unset($_SESSION['InstagiftCarrinho']);
		$redirect = "index.php";
	}else{
		foreach ($_SESSION['InstagiftCarrinho'] as $kChart => $vChart) {
			$obj = unserialize($vChart);
			if ($obj->getIdLocal() == $_GET['id']) {
				unset($_SESSION['InstagiftCarrinho'][$kChart]);
			}
		}
		$redirect = "carrinho.php";
	}
    
    header("Location: ".$redirect);
}
?>