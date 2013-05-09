<?php
session_start();
error_reporting(E_ALL);
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
		$(document).ready(function() {
			var clientId = 'fc50d2f7eb9b49f384280a3cc32af0d6';
			$(".imgsquemja").instagram({
			hash: 'instagiftbr',
			show: 10,
			clientId: clientId
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
                </div>
            </div>
        </div>
<?php
include("inc/footer_site.php");
?>