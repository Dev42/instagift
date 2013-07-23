<?php
include_once '../config/connection.php';
include_once '../painel/conf/classLoader.php';

if($_POST['metodo'] == 'fb'){
	$retorno = 5;
	session_start();
	$_SESSION['InstagiftDescCompFb'] = 'ok';
}else{
	$cupomController = new CupomController();
	$retorno = $cupomController->verificaCupom($_POST['codigoCupom']);
}
if($retorno != 0){
	echo "ok|".$retorno;
}else{
	echo "invalido";
}
?>