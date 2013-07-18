<?php
session_start();
if($_GET['action'] == 'sair'){
	unset($_SESSION['InstagiftTipoLogin']);
	unset($_SESSION['LogadoInstagift']);
	header("Location: ../index.php");
	break;
}
//Coloca o Id do produto desejado em Session
if(isset($_GET['id'])){
	$_SESSION['InstagiftProdId'] = $_GET['id'];
}

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1" || $_SERVER["REMOTE_ADDR"] == "::1") {
	$appIdFace = "379620018818263";
	$appSecretFace = "b7e7ea23e55394341ac1fb051382a248";
	$clientIdInsta = "e6aeb2b57bef44c997107d92d234d695";
	$clientSecretInsta = "cbf5bdff67cd4de6bc493830bbdeeb3b";
	$redirectUrlInsta = "http://localhost/instagift/process/processRedirectInsta.php";
}else{
	$appIdFace = "619446894748617";
	$appSecretFace = "e36eb608b47d070353394814c9541b10";
	$clientIdInsta = "fc50d2f7eb9b49f384280a3cc32af0d6";
	$clientSecretInsta = "8a7f1b5af57040ee97f89092cf63b21b";
	$redirectUrlInsta = "http://instagift.com.br/instagift/process/processRedirectInsta.php";
}

include("../WebServer/Instagram/Instagram.php");
include("../WebServer/Facebook/facebook.php");

//Inicio da conexao com o Facebook para verificar se existe login
$facebook = new Facebook(array(
		'appId'  => $appIdFace,
		'secret' => $appSecretFace
));
 
$o_user = $facebook->getUser();

//Se existir login com o Facebook, finalizar para abrir com o Instagram
if($o_user != 0){
	foreach($_SESSION as $kSession => $vSession){
		$pos = strpos($kSession, "fb_");
		if($pos !== false){
			unset($_SESSION[$kSession]);
		}
	}
	unset($_SESSION['InstagiftTipoLogin']);
	$o_user = 0;
}

//Inicio da conexao com o Instagram
$access_token_parameters = array(
		'client_id'                =>     $clientIdInsta,
		'client_secret'            =>     $clientSecretInsta,
		'grant_type'               =>     'authorization_code',
		'redirect_uri'             =>     $redirectUrlInsta 
);

if(isset($_GET['code']) && !isset($_SESSION['instaAccess'])){
	$code = $_GET['code'];
		
	$url = "https://api.instagram.com/oauth/access_token";

	$access_token_parameters['code'] = $code;
	
	$curl = curl_init($url);    // we init curl by passing the url
	curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
	curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);   // to perform the curl session
	curl_close($curl);   // to close the curl session

	$arr = json_decode($result,true);
	
	if (!isset($arr['OAuthException'])){
		$_SESSION['instaAccess'] = $arr;
	}
	header("Location:processRedirectInsta.php");
}else if(isset($_SESSION['instaAccess'])){
	$Instagram = new Instagram($access_token_parameters);
	$Instagram->setAccessToken($_SESSION["instaAccess"]["access_token"]);
	
	$userInfo = $Instagram->getUser($_SESSION["instaAccess"]["user"]["id"]);
	
	$response = json_decode($userInfo, true);
	
	$fotosUser = $Instagram->getUserRecent($_SESSION['instaAccess']['user']['id']);
	$instaPhotos = json_decode($fotosUser, true);
	
	$_SESSION['InstagiftTipoLogin'] = 'Insta';
	$_SESSION['InstagiftDadosInsta'] = $response;
	$_SESSION['InstagiftNrFotos'] = count($instaPhotos['data']);
	
	header("Location: ../produtos.php");
	
}else{
	header("Location:https://api.instagram.com/oauth/authorize/?client_id=".$clientIdInsta."&redirect_uri=".$redirectUrlInsta."&response_type=code");
}
?>