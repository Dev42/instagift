<?php
session_start();
if($_GET['action'] == 'sair'){
	unset($_SESSION['InstagiftTipoLogin']);
	header("Location: ../index.php");
	break;
}
//Coloca o Id do produto desejado em Session
if(isset($_GET['id'])){
	$_SESSION['InstagiftProdId'] = $_GET['id'];
}
if(isset($_SESSION['IdInstagift'])){
	header("Location: ../produtos.php");
}else{
	header("Location: ../login.php");
}
?>