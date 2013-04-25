<?php
session_start();

//Coloca o Id do produto desejado em Session
$_SESSION['InstagiftProdId'] = $_GET['id'];

include("../WebServer/Instagram/Instagram.php");
include("../WebServer/Facebook/facebook.php");

//Inicio da conexao com o Facebook para verificar se existe login
$facebook = new Facebook(array(
		'appId'  => '619446894748617',
		'secret' => 'e36eb608b47d070353394814c9541b10'
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
		'client_id'                =>     'fc50d2f7eb9b49f384280a3cc32af0d6',
		'client_secret'            =>     '8a7f1b5af57040ee97f89092cf63b21b',
		'grant_type'               =>     'authorization_code',
		'redirect_uri'             =>     'http://instagift.com.br/instagift/perfilInsta.php'
);

if(!isset($_SESSION['instaAccess'])){
	header("Location:https://api.instagram.com/oauth/authorize/?client_id=fc50d2f7eb9b49f384280a3cc32af0d6&redirect_uri=http://localhost/instagift/process/processRedirectInsta.php&response_type=code");
}else{
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
		
		$Instagram = new Instagram($access_token_parameters);
		$Instagram->setAccessToken($_SESSION["instaAccess"]["access_token"]);
		
		$userInfo = $Instagram->getUser($_SESSION["instaAccess"]["user"]["id"]);
		
		$response = json_decode($userInfo, true);
		
		$_SESSION['InstagiftTipoLogin'] = 'Insta';
		$_SESSION['InstagiftDadosInsta'] = $response;
	}
}

?>