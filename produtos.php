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
$infoPrd = new ProdutoInfoController();
if (isset($_SESSION['InstagiftProdId'])){
	$idProd = $_SESSION['InstagiftProdId'];
	unset($_SESSION['InstagiftProdId']);
	
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
	
    $prdList = $prdFront->listAction($idProd, "produto_12_active = 1");
	foreach ($prdList as $k => $v){
		$title = "Produto - ".$v->getNome();
	}
	
	$access_token_parameters = array(
			'client_id'                =>     $clientIdInsta,
			'client_secret'            =>     $clientSecretInsta,
			'grant_type'               =>     'authorization_code',
			'redirect_uri'             =>     $redirectUrlInsta 
	);
	
	$facebook = new Facebook(array(
			'appId'  => $appIdFace,
			'secret' => $appSecretFace
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
			$photos = $facebook->api(array(
								'method'    => 'fql.query',
								'query'     => 'SELECT src,src_big,src_height,src_width FROM photo WHERE aid IN (SELECT aid FROM album WHERE owner=me()) OR pid IN (SELECT pid FROM photo_tag WHERE subject=me())'
							));
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
			$jsonCores = $v->getCores();
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
            	<span class="titProduto">Opções de Compra</span>
                <?php
					$listaOpcoes = $infoPrd->getProdutoAction('produto_10_id',$v->getId());
					$contOpcoes = 0;
					foreach($listaOpcoes as $kInfoPrd => $vInfoPrd){
						if($contOpcoes == 0){
							$modeloPadrao = $vInfoPrd['produto_info_10_id'];
							$nrFotosPadrao = $vInfoPrd['produto_info_10_nrFotos'];
							$classeOpcao = 'contOpcaoModelo active clearfix';
						}else{
							$classeOpcao = 'contOpcaoModelo clearfix';
						}
						
						echo "<div class='".$classeOpcao."' style='cursor:pointer;' onclick='selecionaOpcaoCompra(this,\"".$vInfoPrd['produto_info_10_id']."\",\"".$vInfoPrd['produto_info_10_nrFotos']."\")'>		
								<span class='titOpcaoCompra'>".$vInfoPrd['produto_info_30_nome']."</span>
								<br>
								<span class='descOpcaoCompra'>".$vInfoPrd['produto_info_35_desc']." - R$ ".str_replace(".",",",$vInfoPrd['produto_info_20_valor'])."</span>
							  </div>";
						
						$contOpcoes++;
					}
				?>
            </div>
            <div class="row dica">
            	<span class="titProduto">Opções de Cores</span>
                <div class="contCorModelo clearfix">
                <?php
					$contCores = 0;
					foreach($arCores as $corProd){
						if($contCores == 0){
							$corPadrao = $corProd->nome;
							$classeCor = 'boxCorProd';
						}else{
							$classeCor = 'boxCorProd';
						}
						
						echo "<div class='corProd'>
									<div class='".$classeCor."' onclick='selecionaCor(this,\"".$corProd->nome."\")' style='background-color:#".$corProd->cor."'></div>
									<span>".$corProd->nome."</span>
								  </div>";
								  
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
        <?php
			if($v->getTipo() == '1'){
		?>
        <div class="span8">
            <form name="comprarForm" method="post" action="process/processAdicionaCarrinho.php">
                <input type="hidden" value="<?php echo $idProd; ?>" name="prdId" />
                <input type="hidden" value="" name="selCor" id="selCor" />
                <input type="hidden" value="<?php echo $modeloPadrao; ?>" name="selModelo" id="selModelo" />
                <input type="hidden" value="1" name="nrFotosTampa" id="nrFotosTampa" />
                <input type="hidden" value="<?php echo $nrFotosPadrao; ?>" name="nrFotos" id="nrFotos" />
                <input type="hidden" name="urlFotosTampa" id="urlFotosTampa" />
                <input type="hidden" name="urlFotos" id="urlFotos" />
        	<div class="row">
            	<span class="titProduto">Escolha suas fotos</span>
            </div>
            <div class="row listaFotos">
                <div class="fotos">
                    <?php
                    
                        if (isset($instaPhotos['data'])){
                            foreach ($instaPhotos['data'] as $instaPhoto){
                                echo '<div class="containerQuadFotoGrd"><img src="'.$instaPhoto['images']['thumbnail']['url'].'" alt="" onclick="adicionarFotoCaixa(\''.$instaPhoto['images']['thumbnail']['url'].'\',\''.$instaPhoto['images']['standard_resolution']['url'].'\',\'quad\')"></div>';
                            }
                        }
        
						if (isset($photos)){
                            foreach ($photos as $photo){
								if($photo['src_width'] > $photo['src_height']){
									$marginLeft = floor(((($photo['src_width'] * 100) / $photo['src_height'])-100) / 2);
									$marginLeftScript = floor($marginLeft / 2);
                                	echo '<div class="containerLarFotoGrd"><img src="'.$photo['src_big'].'" style="margin-left:-'.$marginLeft.'px;" alt="" onclick="adicionarFotoCaixa(\''.$photo['src'].'\',\''.$photo['src_big'].'\',\'lar\',\''.$marginLeftScript.'\')"></div>';
								}else if($photo['src_height'] > $photo['src_width']){
									echo '<div class="containerAltFotoGrd"><img src="'.$photo['src_big'].'" alt="" onclick="adicionarFotoCaixa(\''.$photo['src'].'\',\''.$photo['src_big'].'\',\'alt\',\'0\')"></div>';
								}else{
									echo '<div class="containerQuadFotoGrd"><img src="'.$photo['src_big'].'" alt="" onclick="adicionarFotoCaixa(\''.$photo['src'].'\',\''.$photo['src_big'].'\',\'quad\',\'0\')"></div>';
								}
                            }
                        }
                    ?>
                </div>
        	</div>
            
            <div class="row fotosSelecionadas">
            	<span class="titProduto tampa">Imagens Selecionadas - Tampa</span>
                
                <div class="boxNrFotosTampa active" onclick="selecionaNrFotosTampa(this,'1')">
                    <span>Modelo 1 Foto</span>
                </div>
                
                <div class="boxNrFotosTampa" onclick="selecionaNrFotosTampa(this,'4')">
                    <span>Modelo 4 Fotos</span>
                </div>
            </div>
            <div class="row listaFotos">
                <div class="fotos" id="selecaoFotosTampa">
                    <div class="spaceFoto"></div>
                </div>
        	</div>
            
            <div class="row fotosSelecionadas">
            	<span class="titProduto">Imagens Selecionadas - Laterais </span> <span class="descProduto" id="count">0</span> <span class="descProduto"> de </span><span class="descProduto" id="txtNrFotos"><?php echo $nrFotosPadrao; ?></span><span class="descProduto"> imagens selecionadas</span>
            </div>
            <div class="row">
                <div class="fotos" id="selecaoFotos">
                    <?php
						for($f=1;$f<=$nrFotosPadrao;$f++){
							echo '<div class="spaceFoto"></div>';
						}
					?>
                </div>
        	</div>
            
            <div class="row comprar">
                <div class="btn-comprar" id="btn-comprar" style="display:none;">
                    <input type="button" value="Comprar" id="comprar" name="comprar" onclick="validaCompra()">
                </div>
            </div>
            </form>
        </div>
        <?php
			}else{
		?>
        <div class="span8">
            <form name="comprarForm" method="post" action="process/processAdicionaCarrinho.php">
                <input type="hidden" value="<?php echo $idProd; ?>" name="prdId" />
                <input type="hidden" value="" name="selCor" id="selCor" />
                <input type="hidden" value="<?php echo $modeloPadrao; ?>" name="selModelo" id="selModelo" />
                <input type="hidden" value="<?php echo $nrFotosPadrao; ?>" name="nrFotos" id="nrFotos" />
                <input type="hidden" name="urlFotos" id="urlFotos" />
        	<div class="row">
            	<span class="titProduto">Escolha suas fotos</span>
            </div>
            <div class="row listaFotos">
                <div class="fotos">
                    <?php
                    
                        if (isset($instaPhotos['data'])){
                            foreach ($instaPhotos['data'] as $instaPhoto){
								echo '<div class="containerQuadFotoGrd"><img src="'.$instaPhoto['images']['thumbnail']['url'].'" alt="" onclick="adicionarFoto(\''.$instaPhoto['images']['thumbnail']['url'].'\',\''.$instaPhoto['images']['standard_resolution']['url'].'\',\'padrao\',\'quad\')"></div>';
                            }
                        }
        
						if (isset($photos)){
                            foreach ($photos as $photo){
								if($photo['src_width'] > $photo['src_height']){
									$marginLeft = floor(((($photo['src_width'] * 100) / $photo['src_height'])-100) / 2);
									$marginLeftScript = floor($marginLeft / 2);
                                	echo '<div class="containerLarFotoGrd"><img src="'.$photo['src_big'].'" style="margin-left:-'.$marginLeft.'px;" alt="" onclick="adicionarFoto(\''.$photo['src'].'\',\''.$photo['src_big'].'\',\'padrao\',\'lar\',\''.$marginLeftScript.'\')"></div>';
								}else if($photo['src_height'] > $photo['src_width']){
									echo '<div class="containerAltFotoGrd"><img src="'.$photo['src_big'].'" alt="" onclick="adicionarFoto(\''.$photo['src'].'\',\''.$photo['src_big'].'\',\'padrao\',\'alt\',\'0\')"></div>';
								}else{
									echo '<div class="containerQuadFotoGrd"><img src="'.$photo['src_big'].'" alt="" onclick="adicionarFoto(\''.$photo['src'].'\',\''.$photo['src_big'].'\',\'padrao\',\'quad\',\'0\')"></div>';
								}
                            }
                        }
                    ?>
                </div>
        	</div>
            <div class="row fotosSelecionadas">
            	<span class="titProduto">Imagens Selecionadas </span> <span class="descProduto" id="count">0</span> <span class="descProduto"> de </span><span class="descProduto" id="txtNrFotos"><?php echo $nrFotosPadrao; ?></span><span class="descProduto"> imagens selecionadas</span>
            </div>
            <div class="row">
                <div class="fotos" id="selecaoFotos">
                    <?php
						for($f=1;$f<=$nrFotosPadrao;$f++){
							echo '<div class="spaceFoto"></div>';
						}
					?>
                </div>
        	</div>
            <div class="row frasesCool" id="frasesCool" style="display:none;">
            	<div class="btn-comprar" id="btn-personalizar">
                    <input type="button" value="Personalizar" id="personalizar" name="personalizar" onclick="iniciaFrasesCool()">
                </div>
           	</div>
            <div class="row comprar">
                <div class="btn-comprar" id="btn-comprar" style="display:none;">
                    <input type="button" value="Continuar" id="comprar" name="comprar" onclick="validaCompra()">
                </div>
            </div>
            </form>
        </div>
        <?php
			}
		?>
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
		$boxBanner .= 			'<a href="process/processRedirectUser.php?id='.$v->getId().'" class="loginUser"><img src="images/site/ico-upload.png" alt="Login"></a>';
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
