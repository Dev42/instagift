<?php
session_start();
error_reporting(E_ERROR);
include_once 'config/connection.php';
include_once 'painel/conf/classLoader.php';
include("WebServer/Instagram/Instagram.php");
include("WebServer/Facebook/facebook.php");

$menuClass = array("active","","");

$prdFront = new ProdutoFrontController();
$fotoPrd = new FotoProdutoController();

if (isset($_SESSION['InstagiftProdId'])){
	$idProd = $_SESSION['InstagiftProdId'];
	//unset($_SESSION['InstagiftProdId']);
	
    $prdList = $prdFront->listAction($idProd, "produto_12_active = 1");
	foreach ($prdList as $k => $v){
		$title = "Produto - ".$v->getNome();
	}
	
	$access_token_parameters = array(
			'client_id'                =>     'fc50d2f7eb9b49f384280a3cc32af0d6', //'097713367ef9406db262c4b7592b43bc',
			'client_secret'            =>     '8a7f1b5af57040ee97f89092cf63b21b', //'171763c7c85e456e82b23f42ac3682f1',
			'grant_type'               =>     'authorization_code',
			'redirect_uri'             =>     'http://instagift.com.br/instagift/perfilInsta.php'
	);
	
	$facebook = new Facebook(array(
			'appId'  => '619446894748617',
			'secret' => 'e36eb608b47d070353394814c9541b10'
	));
	 
	$o_user = $facebook->getUser();
	 
	if($o_user != 0 || isset($_SESSION['instaAccess'])){
		
		if($_SESSION['InstagiftTipoLogin'] == 'Insta'){
			$Instagram = new Instagram($access_token_parameters);
			$Instagram->setAccessToken($_SESSION["instaAccess"]["access_token"]);
			
			$userInfo = $Instagram->getUser($_SESSION["instaAccess"]["user"]["id"]);
			$response = json_decode($userInfo, true);
			
			$fotosUser = $Instagram->getUserRecent($_SESSION['instaAccess']['user']['id']);
			$instaPhotos = json_decode($fotosUser, true);
		}else if($_SESSION['InstagiftTipoLogin'] == 'Fb'){
			$me = $_SESSION['InstagiftDadosUserFb'];
			$picture = $_SESSION['InstagiftFotoUserFb'];
			$photos = $facebook->api('/me/photos?limit=9000&offset=0');
		}else{
			header("Location:produtos.php");
		}
	}else{
		header("Location:produtos.php");	
	}
}else{
    $prdList = $prdFront->listAction(false, "produto_12_active = 1");
	$title = "Produtos";
	$link = "produtos.php?id=";
}

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1" || $_SERVER["REMOTE_ADDR"] == "::1") {
    $geralUrl = "http://localhost/instagift/";
} else {
    $geralUrl = "http://instagift.com.br/instagift/";
}

$uploadPath = $geralUrl . "images/uploads/";

include("inc/header_site.php");
if ($idProd){
	foreach ($prdList as $k => $v){
		if($v->getCores() == '[]'){
			$jsonCores = '[{"cor":"ffffff","nome":"Única"}]';
		}else{
			//$jsonCores = $v->getCores();
			$jsonCores = '[{"cor":"ffffff","nome":"Única"}]';
		}
		$arCores = json_decode($jsonCores);
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
            	<span class="titProduto">Opção de Compra</span>
            </div>
            <div class="row dica">
            	<span class="titProduto">Opções de Cores</span>
                <div class="contCorModelo clearfix">
                <?php
					$contCores = 0;
					foreach($arCores as $corProd){
						if($contCores == 0){
							$corPadrao = $corProd->nome;
							echo "<div class='corProd'>
									<div class='boxCorProd active' onclick='selecionaCor(this,\"".$corProd->nome."\")' style='background-color:#".$corProd->cor."'></div>
									<span>".$corProd->nome."</span>
								  </div>";
						}else{
							echo "<div class='corProd'>
									<div class='boxCorProd' onclick='selecionaCor(this,\"".$corProd->nome."\")' style='background-color:#".$corProd->cor."'></div>
									<span>".$corProd->nome."</span>
								  </div>";
						}
						$contCores++;
					}
				?>
                </div>
            </div>
            <div class="row dica">
            	<span class="titProduto">Dica</span>
                <br />
                <span class="descProduto">Escolha a imagem desejada e clique para selecionar. Caso você queira remover uma imagem selecionada, basta clicar nela na lista de imagens selecionadas.</span>
            </div>
        </div>
        <div class="span8">
            <form name="comprarForm" method="post" action="fechaPedido.php">
                <input type="hidden" value="<?php echo $idProd; ?>" name="prdId" />
                <input type="hidden" value="<?php echo $corPadrao; ?>" name="selCor" id="selCor" />
        	<div class="row">
            	<span class="titProduto">Escolha suas fotos</span>
            </div>
            <div class="row listaFotos">
                <div class="fotos">
                    <?php
                    
                        if (isset($instaPhotos['data'])){
                            foreach ($instaPhotos['data'] as $instaPhoto){
                                echo '<img src="'.$instaPhoto['images']['thumbnail']['url'].'" alt="" onclick="adicionarFoto(\''.$instaPhoto['images']['thumbnail']['url'].'\',\''.$instaPhoto['images']['standard_resolution']['url'].'\',\''.$v->getMinimoFotos().'\')">';
                            }
                        }
        
                        if (isset($photos['data'])){
                            foreach ($photos['data'] as $photo){
                                echo '<img src="'.$photo['picture'].'" alt="" onclick="adicionarFoto(\''.$photo['picture'].'\',\''.$photo['source'].'\',\''.$v->getMinimoFotos().'\')">';
                            }
                        }
                    ?>
                </div>
        	</div>
            <div class="row fotosSelecionadas">
            	<span class="titProduto">Fotos Selecionadas </span> <span class="descProduto" id="count">0</span> <span class="descProduto" id="count"> de <?php echo $v->getMinimoFotos(); ?> fotos selecionadas</span>
            </div>
            <div class="row">
                <div class="fotos" id="selecaoFotos">
                    <input type="hidden" name="urlFotos" id="urlFotos" />
                </div>
        	</div>
            <div class="row comprar">
                <div class="btn-comprar" id="btn-comprar" style="display:none;">
                    <input type="submit" value="Comprar" id="comprar" name="comprar">
                </div>
            </div>
            </form>
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
		$boxBanner .= 		'<div class="thumbs">';
					$listaFotos = $fotoPrd->listAction(false,$v->getId());
					foreach($listaFotos as $kFotoPrd => $vFotoPrd){
						$boxBanner .= "<div class='thumbProduto'>";
						$fotoUrl = $vFotoPrd['foto_produto_30_url'];
						$boxBanner .= "<a rel='prettyPhoto[prod_".$v->getId()."]' href='images/uploads/produtos/".$fotoUrl."'><img src='images/uploads/produtos/".$fotoUrl."' width='75px' height='75px' /></a>";
						$boxBanner .= "</div>";
					}
		$boxBanner .= 		'</div>';
		$boxBanner .=	'<img src="images/site/label-ampliar.jpg" style="margin-left:27px;" />';
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
		$boxBanner .= 			'<a href="process/processRedirectInsta.php?id='.$v->getId().'" class="loginInsta"><img src="images/site/ico-instagram.png" alt="Login - Instagram"></a>';
		$boxBanner .= 			'<a href="process/processRedirectFace.php?id='.$v->getId().'" class="loginFace"><img src="images/site/ico-facebook.png" alt="Login - Facebook"></a>';
		$boxBanner .= 		'</div>';
		$boxBanner .= 	'</div>';
		$boxBanner .= '</div>';
		echo $boxBanner;
	?>
	</div>
<?php
	}
	echo '<script>
	$(document).ready(function(){
    	$("a[rel^=\'prettyPhoto\']").prettyPhoto();
  	});
  	</script>';
}
include("inc/footer_site.php");
?>
