<?php
include_once 'config/connection.php';
include_once 'painel/conf/classLoader.php';

$menuClass = array("active","","","");
$title = "Produtos";

$prdFront = new ProdutoFrontController();

if (isset($_GET['id'])){
    $prdList = $prdFront->listAction($_GET['id'], "produto_12_active = 1");
}else{
    $prdList = $prdFront->listAction(false, "produto_12_active = 1");
}

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $geralUrl = "http://localhost/instagift/";
} else {
    $geralUrl = "http://instagift.com.br/";
}

$uploadPath = $geralUrl . "images/uploads/";

include("inc/header_site.php");

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
					$boxBanner .= '<img src="images/site/modelo-box.jpg" alt="Modelo Box Produtos" />';
					$boxBanner .= '</div>';
					echo $boxBanner;
            ?>
            </div>
            <?php
                }
include("inc/footer_site.php");
            ?>