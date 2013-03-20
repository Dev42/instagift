<?php
unset($_SESSION['LogadoInstagift']);

include_once 'config/connection.php';
include_once 'painel/conf/classLoader.php';
include_once 'WebServer/Instagram/Instagram.php';

$instagram = new Instagram($access_token_parameters);

$menuClass = array("active","","");

$prdFront = new ProdutoFrontController();

if (isset($_GET['id'])){
    $prdList = $prdFront->listAction($_GET['id'], "produto_12_active = 1");
	foreach ($prdList as $k => $v){
		$title = "Produto - ".$v->getNome();
	}
	if(isset($_SESSION['InstagramAccessToken'])){
		$instagram->setAccessToken($_SESSION['InstagramAccessToken']);
		$userinfo = $instagram->getUser($_SESSION['InstagramAccessToken']);
		
		$ures = json_decode($userinfo, true);
		
		$mostRecent = $instagram->getUserRecent($ures['data']['id']);
		$mediasUser = json_decode($mostRecent, true);
	}
}else{
    $prdList = $prdFront->listAction(false, "produto_12_active = 1");
	$title = "Produtos";
	
	$access_token_parameters = array(
        'client_id'                =>     'a7d78226833e45078e1fc9b1a279abb0',
        'client_secret'                =>     '96d3f1fdf0474d11ba37984e87aeda16',
        'grant_type'                =>     'authorization_code',
        'redirect_uri'                =>     'http://instagift.com.br/instagift/produtos.php',
        'code'                        =>     $_GET['code']
	);
	
	session_start();
	
	$accessToken = $instagram->getAccessToken();
	$_SESSION['InstagramAccessToken'] = $accessToken;
	
	if(isset($_SESSION['InstagramAccessToken'])){
		$link = 'produtos.php?id=';
	}else{
		$link = 'https://api.instagram.com/oauth/authorize/?client_id=a7d78226833e45078e1fc9b1a279abb0&redirect_uri=http://instagift.com.br/instagift/produtos.php&response_type=code&other=';
	}
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
            	<span class="nomeProduto">
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
            	<span class="nomeProduto">Dica</span>
                <br />
                <span class="descProduto">Escolha a imagem desejada e clique para selecionar. Caso você queira remover uma imagem selecionada, basta clicar nela na lista de imagens selecionadas.</span>
            </div>
        </div>
        <div class="span8">
        	<div class="row">
            	<?php
            		$fotosGeral = $mediasUser['data'];
					foreach($fotosGeral as $l => $u){
						echo "<img src='".$u['images']['thumbnail']['url']."' />";
					}
				?>
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
		$lineBanner = '<div class="span12">';
		$uploadPathBanner = $uploadPath."produtos/banners/".$v->getBanner(true);
		$bannerImg = '<img src="'.$uploadPathBanner.'" width="960" height="338" alt="'.$v->getNome().'" />';
		$lineBanner .= '<a href="#" onClick="showBox('.$v->getId().')">'.$bannerImg.'</a>';
		$lineBanner .= '</div>';
		echo $lineBanner;
		
		$boxBanner = '<div class="span12 boxprodutos" id="box_'.$v->getId().'" style="display:none;">';
		$boxBanner .= '<img src="images/site/btn-fechar.jpg" alt="Fechar" onClick="hideBox('.$v->getId().')" style="float:right; margin-right:20px; cursor:pointer;" />';
		$boxBanner .= '<a href="'.$link.$v->getId().'"><img src="images/site/modelo-box.jpg" alt="Modelo Box Produtos" border="0" /></a>';
		$boxBanner .= '</div>';
		echo $boxBanner;
	?>
	</div>
<?php
	}
}
include("inc/footer_site.php");
?>
