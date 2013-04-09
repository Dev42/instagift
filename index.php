<?php
session_start();
include_once 'config/connection.php';
include_once 'painel/conf/classLoader.php';

$menuClass = array("","","");
$title = "Suas fotos viram presentes";

$prdFront = new ProdutoFrontController();
$prdList = $prdFront->listAction(false, "produto_12_active = 1");

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $geralUrl = "http://localhost/instagift/";
} else {
    $geralUrl = "http://instagift.com.br/instagift/";
}

$uploadPath = $geralUrl . "images/uploads/";

include("inc/header_site.php");
?>
        <script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'images/site/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
		</script>
        <div class="row slider">
        	<div class="span12">
				<div id="slides">
                    <div class="slides_container">
                    	<?php
                    		foreach ($prdList as $k => $v){
								$uploadPathBanner = $uploadPath."produtos/banners/".$v->getBanner(true);
                        		echo '<a href="produtos.php?id='.$v->getId().'"><img src="'.$uploadPathBanner.'" width="960" height="338" alt="'.$v->getNome().'"></a>';
							}
                        ?>
                    </div>
                    <a href="#" class="prev"><img src="images/site/btn-anterior.png" width="87" height="44" alt="Anterior"></a>
					<a href="#" class="next"><img src="images/site/btn-seguinte.png" width="87" height="44" alt="Próxima"></a>
                </div>
            </div>
        </div> 
        <div class="row passoapasso">
        	<div class="span12">
            	<div class="instrucoes"><img src="images/site/passo-a-passo.png" alt="Passo a passo"></div>
            </div>
        </div>
        <div class="row quemja">
        	<div class="span12">
            	<div class="titquemja"></div>
                <div class="imgsquemja">
                	<img src="images/site/quemjamodelo.png" alt="1">
                    <img src="images/site/quemjamodelo.png" alt="2">
                    <img src="images/site/quemjamodelo.png" alt="3">
                    <img src="images/site/quemjamodelo.png" alt="4">
                    <img src="images/site/quemjamodelo.png" alt="5">
                    <img src="images/site/quemjamodelo.png" alt="6">
                    <img src="images/site/quemjamodelo.png" alt="7">
                    <img src="images/site/quemjamodelo.png" alt="8">
                    <img src="images/site/quemjamodelo.png" alt="9">
                    <img src="images/site/quemjamodelo.png" alt="10">
                </div>
            </div>
        </div>
<?php
include("inc/footer_site.php");
?>