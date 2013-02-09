<?php
include_once 'config/connection.php';
include_once 'painel/conf/classLoader.php';

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
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Instagift - Produtos</title> 
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />  
        <link href="css/style_site.css" rel="stylesheet" type="text/css" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row topo">
                <div class="span12">
                    <div class="logo"><a href="index.php"><img src="images/site/logo-header.png" alt="Instagift - Suas fotos viram presentes"></a></div>
                    <div class="menu">
                        <ul id="nav">
                            <li><a href="produtos.php" class="active"><span>PRODUTOS</span></a></li>
                            <li><a href="#"><span>COMO COMPRAR</span></a></li>
                            <li><a href="#" class="last"><span>CONTATO</span></a></li> 
                        </ul>
                    </div>
                </div>
            </div> 
            <?php
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
            ?>
            <div class="row footer">
                    <div class="fatiafooter"></div>
                    <div class="span11">
                    <div class="logofooter">
                            <span>Suas fotos viram presentes</span>
                    </div>
                    <div class="menu">
                            <ul id="nav">
                            <li><a href="produtos.php" class="active"><span>PRODUTOS</span></a></li>
                            <li><a href="#"><span>COMO COMPRAR</span></a></li> 
                            <li><a href="#"><span>QUEM SOMOS</span></a></li>
                            <li><a href="#"><span>CONTATO</span></a></li> 
                            <li><a href="#"><span>VIDA SOCIAL</span></a></li>  
                        </ul>
                    </div>
                    <div class="menuSocial">
                            <ul id="nav">
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="instagram"></a></li>
                            <li><a href="#" class="pinterest"></a></li>
                            <li><a href="#" class="mail"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span11">
                    <div class="frasefooter"><img src="images/site/frase-footer.png" alt="Frase Footer"></div>
                </div>
                <div class="span11">
                    <span class="copyrights">© 2012 Instagift - All rights reserved</span>
                </div>
            </div>                   
        </div> 
    </body>
</html>