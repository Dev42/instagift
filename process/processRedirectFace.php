<?php
session_start();

//Coloca o Id do produto desejado em Session
if(isset($_GET['id'])){
	$_SESSION['InstagiftProdId'] = $_GET['id'];
}

include("../WebServer/Instagram/Instagram.php");
include("../WebServer/Facebook/facebook.php");

//Se existir login com o Instagram, finalizar para abrir com o Facebook
if (isset($_SESSION['instaAccess'])){
	unset($_SESSION['instaAccess']);
	unset($_SESSION['InstagiftTipoLogin']);
	unset($_SESSION['InstagiftDadosUser']);
}

//Inicio da conexao com o Instagram
$facebook = new Facebook(array(
		'appId'  => '619446894748617',
		'secret' => 'e36eb608b47d070353394814c9541b10'
));

$o_user = $facebook->getUser();

if($o_user == 0){
	//Coloca o Id do produto desejado em Session
	$_SESSION['InstagiftProdId'] = $_GET['id'];
	
	$urlFacebook = $facebook->getLoginUrl(array('scope' => array('publish_stream','read_stream')));
	header("Location: ".$urlFacebook);
}else{
	$_SESSION['InstagiftTipoLogin'] = 'Fb';
	$_SESSION['InstagiftDadosUserFb'] = $facebook->api('/me');
	$_SESSION['InstagiftFotoUserFb'] = $facebook->api('/me?fields=picture');
	$photos = $facebook->api('/me/photos?limit=9000&offset=0');
	$_SESSION['InstagiftNrFotos'] = count($photos['data']);
	header("Location: ../produtos.php");
}

?>