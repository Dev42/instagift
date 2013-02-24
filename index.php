<?php
$menuClass = array("","","","");
$title = "Suas fotos viram presentes";

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
                        <a href="produtos.php"><img src="images/banners/imas.jpg" width="960" height="338" alt="Imãs"></a>
                        <a href="produtos.php"><img src="images/banners/minibook.jpg" width="960" height="338" alt="Minibook"></a>
                        <a href="produtos.php"><img src="images/banners/squares.jpg" width="960" height="338" alt="Squares"></a>
                        <a href="produtos.php"><img src="images/banners/caixamdf.jpg" width="960" height="338" alt="Caixa MDF"></a>
                        <a href="produtos.php"><img src="images/banners/minibox.jpg" width="960" height="338" alt="Minibox"></a>
                        <a href="produtos.php"><img src="images/banners/cards.jpg" width="960" height="338" alt="Cards"></a>
                        <a href="produtos.php"><img src="images/banners/canvas.jpg" width="960" height="338" alt="Canvas"></a>
                        <a href="produtos.php"><img src="images/banners/postais.jpg" width="960" height="338" alt="Postais"></a>
                        <a href="produtos.php"><img src="images/banners/sticker.jpg" width="960" height="338" alt="Sticker"></a>
                        <a href="produtos.php"><img src="images/banners/album.jpg" width="960" height="338" alt="Álbum"></a>
                        <a href="produtos.php"><img src="images/banners/quadro.jpg" width="960" height="338" alt="Quadro"></a>
                        <a href="produtos.php"><img src="images/banners/portaretrato.jpg" width="960" height="338" alt="Porta-Retrato"></a>
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