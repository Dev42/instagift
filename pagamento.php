<?php
session_start();
error_reporting(E_ERROR);
if (!isset($_SESSION['LogadoInstagift'])){
	header("Location: produtos.php");
}else{
$menuClass = array("active","","");
$title = "Ir para pagamento";
include("inc/header_site.php");
?>
	<div class="row login">
    	<div class="span12"><h1>Acesse o link abaixo para ir para o pagamento via PagSeguro</h1></div>
    	<div class="span8" style="margin-bottom:20px;">
        	<a href="<?php echo $_GET['url']; ?>">Ir para o pagamento</a>
        </div>
    </div>
<?php
include("inc/footer_site.php");
}
?>
