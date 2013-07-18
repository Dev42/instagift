<?php
session_start();
if($_GET['action'] == 'sair'){
	unset($_SESSION['InstagiftTipoLogin']);
	foreach($_SESSION as $kSession => $vSession){
		$pos = strpos($kSession, "fb_");
		if($pos !== false){
				unset($_SESSION[$kSession]);
		}
	}
	$o_user = 0;
	header("Location: ../index.php");
}
//Coloca o Id do produto desejado em Session
if(isset($_GET['id'])){
	$_SESSION['InstagiftProdId'] = $_GET['id'];
}

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1" || $_SERVER["REMOTE_ADDR"] == "::1") {
	$appIdFace = "379620018818263";
	$appSecretFace = "b7e7ea23e55394341ac1fb051382a248";	
}else{
	$appIdFace = "619446894748617";
	$appSecretFace = "e36eb608b47d070353394814c9541b10";	
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
		'appId'  => $appIdFace,
		'secret' => $appSecretFace
));

$o_user = $facebook->getUser();

if($o_user == 0){
	//Coloca o Id do produto desejado em Session
	$_SESSION['InstagiftProdId'] = $_GET['id'];
	
	$urlFacebook = $facebook->getLoginUrl(array('scope' => array('publish_stream','read_stream','user_photos')));
	header("Location: ".$urlFacebook);
}else{
	$_SESSION['InstagiftTipoLogin'] = 'Fb';
	$_SESSION['InstagiftDadosUserFb'] = $facebook->api('/me');
	$_SESSION['InstagiftFotoUserFb'] = $facebook->api('/me?fields=picture');
	$photos = $facebook->api(array(
								'method'    => 'fql.query',
								'query'     => 'SELECT src,src_big FROM photo WHERE aid IN (SELECT aid FROM album WHERE owner=me()) OR pid IN (SELECT pid FROM photo_tag WHERE subject=me())'
							));
	$_SESSION['InstagiftNrFotos'] = count($photos);
	header("Location: ../produtos.php");
}

?>