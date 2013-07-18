<?php
session_start();
error_reporting(E_ERROR);
if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1" || $_SERVER["REMOTE_ADDR"] == "::1") {
    $geralUrl = "http://localhost/instagift";
} else {
    $geralUrl = "http://instagift.com.br/instagift/";
}
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
		
	if (isset($_SESSION['instaAccess'])){
		
		$Instagram = new Instagram($access_token_parameters);
		$Instagram->setAccessToken($_SESSION["instaAccess"]["access_token"]);
		
		$userInfo = $Instagram->getUser($_SESSION["instaAccess"]["user"]["id"]);
		
		$response = json_decode($userInfo, true);
	}
	
	$facebook = new Facebook(array(
			'appId'  => '619446894748617',
			'secret' => 'e36eb608b47d070353394814c9541b10'
	));
	 
	$o_user = $facebook->getUser();
	 
	if($o_user == 0)
	{
		$urlFacebook = $facebook->getLoginUrl(array('scope' => array('publish_stream','read_stream')));
		$urlFacebook = str_replace('perfil.php','perfilFb.php', $urlFacebook);
	}
	else
	{
		$me = $facebook->api('/me');
		$picture = $facebook->api('/me?fields=picture');
	}

	include("inc/header_site.php");

$usrFoto = new UserFotoController();
$fotosUser = $usrFoto->listAction($_SESSION['IdInstagift']);
?>
                <div class="clearfix"></div>
                <div class="row painel">
                    <?php
                    if($_SESSION['InstagiftTipoLogin'] != 'user'){
                    ?>
                    <div class="span3 conexao insta">
                        <?php
                            if (isset($_SESSION['instaAccess'])){
                                echo '  <div class="span1">
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
                                echo '  <div class="span1">
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
                    <?php
                    }else {
                    ?>
                    <div class="span12">
                        <h3>Adicionar nova imagem</h3>
                        <div class="conexao">
                            <form name="contatoForm" class="form-stacked" method="post" enctype="multipart/form-data" action="process/processNewPhoto.php">
                                <span class="observation">Selecione a foto que você deseja enviar.</span>
                                <div class="clearfix"></div>
                                <div class="formLine">
                                    <label for="login">Foto</label>
                                    <input type="file" class="uniform" name="prd_foto">
                                </div>
                                <div class="formLine">
                                    <input type="submit" name="button" id="button" value="Enviar Foto" />
                                </div>
                                <input type="hidden" value="<?php echo $_SESSION['IdInstagift']; ?>" name="idUser"/>
                            </form>
                        </div>
                    </div>
                    <div class="span12">
                        <h3>Listagem de imagens inseridas</h3>
                        <div class="conexao">
                    <?php
                        if (count($fotosUser) == 0){
                            echo "Você ainda não enviou nenhuma foto! Comece a participar utilizando o formulário acima!";
                        }else {
                            foreach($fotosUser as $kFoto => $vFoto){
                                $foto = new UserFoto();
                                $foto->setId($vFoto['fot_10_id']);
                                $foto->setPath($vFoto['fot_30_path']);
                                echo "<div class='conexao listImagemUser'>";
                                echo "<img src='".$geralUrl.$foto->getWebPath()."' class='fotoList' id='foto_".$foto->getId()."' />";
                                echo "</div>";
                            }
                        }
                    ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
<?php
	include("inc/footer_site.php");
}else{
	header("Location: login.php");
}
?>