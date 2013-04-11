<?php
session_start();
if (isset($_SESSION['LogadoInstagift'])){
	$menuClass = array("","","");
	$title = "Suas fotos viram presentes";
	include("inc/header_site.php");
	include("WebServer/Instagram/Instagram.php");
	include("WebServer/Facebook/facebook.php");
	
	$access_token_parameters = array(
			'client_id'                =>     'fc50d2f7eb9b49f384280a3cc32af0d6', //'097713367ef9406db262c4b7592b43bc',
			'client_secret'            =>     '8a7f1b5af57040ee97f89092cf63b21b', //'171763c7c85e456e82b23f42ac3682f1',
			'grant_type'               =>     'authorization_code',
			'redirect_uri'             =>     'http://localhost/instagift/perfilInsta.php'
	);
		
	if (isset($_SESSION['instaAccess'])){
		
		$Instagram = new Instagram($access_token_parameters);
		$Instagram->setAccessToken($_SESSION["instaAccess"]["access_token"]);
		
		$userInfo = $Instagram->getUser($_SESSION["instaAccess"]["user"]["id"]);
		
		$response = json_decode($userInfo, true);
		
		$fotosUser = $Instagram->getUserRecent($_SESSION['instaAccess']['user']['id']);
		$instaPhotos = json_decode($fotosUser, true);
	}
	
	$facebook = new Facebook(array(
			'appId'  => '619446894748617',
			'secret' => 'e36eb608b47d070353394814c9541b10'
	));
	 
	$o_user = $facebook->getUser();
	 
	if($o_user == 0)
	{
		$urlFacebook = $facebook->getLoginUrl(array('scope' => array('publish_stream','read_stream')));
	}
	else
	{
		if($_GET['action'] == 'finish' )
		{
		   foreach($_SESSION as $kSession => $vSession){
				$pos = strpos($kSession, "fb_");
				if($pos !== false){
					unset($_SESSION[$kSession]);
				}
			}
			$o_user = 0;
			header("Location: perfil.php");
		}
		else
		{
			$me = $facebook->api('/me');
			$picture = $facebook->api('/me?fields=picture');
			$photos = $facebook->api('/me/photos?limit=9000&offset=0');
		}
	}
	?>
			<div class="clearfix"></div>
			<div class="row" style="margin: 30px 0px;">
				<?php
					if (isset($_SESSION['instaAccess'])){
						echo '<img src="'.$response["data"]["profile_picture"].'" class="userInstaImg">
							  <span>'.$response["data"]["full_name"].'</span>
							  <a href="perfilInsta.php?action=logout">Sair</a>';
					}else{
						echo '<a href="https://api.instagram.com/oauth/authorize/?client_id=fc50d2f7eb9b49f384280a3cc32af0d6&redirect_uri=http://localhost/instagift/perfilInsta.php&response_type=code" class="btn large info">Login with Instagram</a>';
					}
				?>
			</div>
			<div class="row" style="margin: 30px 0px;">
				<?php
					if ($o_user == 0){
						echo '<a href="'.$urlFacebook.'" class="btn large info">Login with Facebook</a>';
					}else{
						echo '<img src="'.$picture["picture"]["data"]["url"].'" class="userFbImg">
							  <span>'.$me["name"].'</span>
							  <a href="perfilFb.php?action=finish">Sair</a>';
					}
				?>
			</div>
			<div class="row fotos clearfix">
				<div class="span8 clearfix">
					<?php
						foreach ($instaPhotos["data"] as $instaPhoto){
					?>
						<img src="<?php echo $instaPhoto["images"]["thumbnail"]["url"]; ?>" alt="">
					<?php
						}
					?>
					
					<?php
						foreach ($photos['data'] as $photo){
					?>
						<img src="<?php echo $photo['picture']; ?>" alt="">
					<?php
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