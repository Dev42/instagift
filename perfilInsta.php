<?php
session_start();
error_reporting(E_ERROR);
if (isset($_SESSION['LogadoInstagift'])){
	$menuClass = array("","","");
	$title = "Suas fotos viram presentes";
	include("WebServer/Instagram/Instagram.php");
	include("WebServer/Facebook/facebook.php");
	
	$access_token_parameters = array(
			'client_id'                =>     'fc50d2f7eb9b49f384280a3cc32af0d6', //'097713367ef9406db262c4b7592b43bc',
			'client_secret'            =>     '8a7f1b5af57040ee97f89092cf63b21b', //'171763c7c85e456e82b23f42ac3682f1',
			'grant_type'               =>     'authorization_code',
			'redirect_uri'             =>     'http://instagift.com.br/instagift/perfilInsta.php'
	);
	if($_GET['action'] == 'logout'){
		unset($_SESSION['instaAccess']);
	}else{
		if(isset($_GET['code']) && !isset($_SESSION['instaAccess'])) {
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
		
		}
		
		if (isset($_SESSION['instaAccess'])){
			
			$Instagram = new Instagram($access_token_parameters);
			$Instagram->setAccessToken($_SESSION["instaAccess"]["access_token"]);
			
			$userInfo = $Instagram->getUser($_SESSION["instaAccess"]["user"]["id"]);
			
			include("process/processLastAccess.php");
			gravarUltimoAcesso($_SESSION["instaAccess"]["user"]["id"],1);
			
			$response = json_decode($userInfo, true);
		}
	}
	
	$facebook = new Facebook(array(
			'appId'  => '619446894748617',
			'secret' => 'e36eb608b47d070353394814c9541b10'
	));
	 
	$o_user = $facebook->getUser();
	 
	if($o_user == 0)
	{
		$urlFacebook = $facebook->getLoginUrl(array('scope' => array('publish_stream','read_stream')));
		$urlFacebook = str_replace('perfilInsta.php','perfilFb.php', $urlFacebook);
	}
	else
	{
		$me = $facebook->api('/me');
		$picture = $facebook->api('/me?fields=picture');
	}
	
	include("inc/header_site.php");
	?>
			<div class="clearfix"></div>
			<div class="row painel">
            	<div class="span3 conexao insta">
					<?php
                        if (isset($_SESSION['instaAccess'])){
                            echo '<div class="span1">
								  	<img src="'.$response["data"]["profile_picture"].'">
								  </div>
								  <div class="span2">
                                  	<span>'.$response["data"]["full_name"].'</span>
									<br>
                                  	<a href="perfilInsta.php?action=logout">Sair</a>
								  </div>';
                        }else{
                            echo '<a href="https://api.instagram.com/oauth/authorize/?client_id=fc50d2f7eb9b49f384280a3cc32af0d6&redirect_uri=http://instagift.com.br/instagift/perfilInsta.php&response_type=code">Conectar ao Instagram</a>';
                        }
                    ?>
                </div>
                <div class="span3 conexao fb">
					<?php
                        if ($o_user == 0){
                            echo '<a href="'.$urlFacebook.'">Conectar ao Facebook</a>';
                        }else{
                            echo '<div class="span1">
									<img src="'.$picture["picture"]["data"]["url"].'">
                                  </div>
								  <div class="span2">
                                  	<span>'.$me["name"].'</span>
									<br>
                                  	<a href="perfilFb.php?action=finish">Sair</a>
								  </div>';
                        }
                    ?>
            	</div>
			</div>
<?php
	include("inc/footer_site.php");
}else{
	header("Location: login.php");
}
?>