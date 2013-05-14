<?php
session_start();
if(isset($_SESSION['InstagiftUrlPgto'])){
	$menuClass = array("active","","");
	$title = "Ir para pagamento";
	include("inc/header_site.php");
	unset($_SESSION['InstagiftCarrinho']);
?>
	<div class="row login">
    	<div class="span12" style="text-align:center; margin-bottom:40px;">
        	<h1 style="text-transform:uppercase; font-size:28px;">Muito obrigado <?php echo $nomeUser ?></h1>
        	<a href="<?php echo base64_decode($_SESSION['InstagiftUrlPgto']); ?>" class="linkPagamento">Clique aqui para selecionar o pagamento</a>
        </div>
        <div class="span12" style="text-align:center;">
    		<img src="images/site/ico-camera.png" alt="Obrigado" style="margin-bottom:50px;" />
        </div>
    </div>
<?php
	include("inc/footer_site.php");
}else{
	header("Location: index.php");
}
?>
