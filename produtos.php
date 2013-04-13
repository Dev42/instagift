<?php
session_start();
include_once 'config/connection.php';
include_once 'painel/conf/classLoader.php';
include("WebServer/Instagram/Instagram.php");
include("WebServer/Facebook/facebook.php");

$menuClass = array("active","","");

$prdFront = new ProdutoFrontController();

if (isset($_GET['id'])){
    $prdList = $prdFront->listAction($_GET['id'], "produto_12_active = 1");
	foreach ($prdList as $k => $v){
		$title = "Produto - ".$v->getNome();
	}
	
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
		$urlFacebook = str_replace('perfilInsta.php','perfilFb.php', $urlFacebook);
	}
	else
	{
		$me = $facebook->api('/me');
		$picture = $facebook->api('/me?fields=picture');
		$photos = $facebook->api('/me/photos?limit=9000&offset=0');
	}
	
}else{
    $prdList = $prdFront->listAction(false, "produto_12_active = 1");
	$title = "Produtos";
	$link = "produtos.php?id=";
}

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $geralUrl = "http://localhost/instagift/";
} else {
    $geralUrl = "http://instagift.com.br/instagift/";
}

$uploadPath = $geralUrl . "images/uploads/";

include("inc/header_site.php");
if (isset($_GET['id'])){
	foreach ($prdList as $k => $v){
?>
	<div class="row produtoInfo">
    	<div class="span4">
        	<div class="row">
            	<span class="titProduto">
                <?php
					echo $v->getNome();
				?>
                </span>
            </div>
            <div class="row">
                <?php
					$uploadPathFotoProd = $uploadPath."produtos/produto/".$v->getFoto(true);
					$produtoImg = '<img src="'.$uploadPathFotoProd.'" width="240" height="180" alt="'.$v->getNome().'" class="fotoProduto" />';
					echo $produtoImg;
				?>
            </div>
            <div class="row">
            	<span class="descProduto">
                <?php
					echo $v->getDescCompleta();
				?>
                </span>
            </div>
            <div class="row dica">
            	<span class="titProduto">Dica</span>
                <br />
                <span class="descProduto">Escolha a imagem desejada e clique para selecionar. Caso você queira remover uma imagem selecionada, basta clicar nela na lista de imagens selecionadas.</span>
            </div>
        </div>
        <div class="span8">
        	<div class="row">
            	<span class="titProduto">Escolha suas fotos</span>
            </div>
            <div class="row">
                <div class="fotos">
                    <?php
                        foreach ($instaPhotos['data'] as $instaPhoto){
                            echo '<img src="'.$instaPhoto['images']['thumbnail']['url'].'" alt="" class="fotoInstagram">';
                        }
        
                        foreach ($photos['data'] as $photo){
                            echo '<img src="'.$photo['picture'].'" alt="" class="fotoFacebook">';
                        }
                    ?>
                </div>
        	</div>
        </div>
    </div>
<?php
	}
}else{
	foreach ($prdList as $k => $v){
	?>
	<div class="row produtos">
	<?php
		$lineBanner = '<div class="span12 produto">';
		$uploadPathBanner = $uploadPath."produtos/banners/".$v->getBanner(true);
		$bannerImg = '<img src="'.$uploadPathBanner.'" width="960" height="338" alt="'.$v->getNome().'" />';
		$lineBanner .= '<a onClick="showBox('.$v->getId().')">'.$bannerImg.'</a>';
		$lineBanner .= '</div>';
		echo $lineBanner;
		
		$boxBanner = '<div class="span12 boxprodutos" id="box_'.$v->getId().'" style="display:none;">';
		$boxBanner .= 	'<div class="span4">';
		$boxBanner .= 	'</div>';
		$boxBanner .= 	'<div class="span4 descricaobox">';
		$boxBanner .= 		'<span>'.$v->getDescCompleta().'</span>';
		$boxBanner .= 	'</div>';
		$boxBanner .= 	'<div class="span4">';
		$boxBanner .= 		'<div class="fechar" onClick="hideBox('.$v->getId().')"></div>';
		$boxBanner .= 		'<div class="txtbox">';
		$boxBanner .= 			'<span>Agora é só escolher suas fotos! Basta clicar no link do Instagram, Facebook ou no Upload para subir suas próprias fotos e autorizar o Instagift para selecionar suas fotos.</span>';
		$boxBanner .= 		'</div>';
		$boxBanner .= 		'<div class="comprar">';
		$boxBanner .= 			'<a href="'.$link.$v->getId().'">Comprar</a>';
		$boxBanner .= 		'</div>';
		$boxBanner .= 	'</div>';
		$boxBanner .= '</div>';
		echo $boxBanner;
	?>
	</div>
<?php
	}
}
include("inc/footer_site.php");
?>
