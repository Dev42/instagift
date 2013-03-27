<?php
session_start();
if (isset($_SESSION['LogadoInstagift'])){
	header("Location: painel.php");
}else{
$menuClass = array("","","");
$title = "Login";
include("inc/header_site.php");
?>
	<div class="row login">
    	<div class="span12"><h1>Envie sua mensagem para entrar em contato</h1></div>
    	<div class="span8">
        	<form name="contatoForm" class="form-stacked" method="post" action="process/processSendContact.php">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" />
                
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" />
                
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" />
                
                <label for="mensagem">Mensagem</label>
                <textarea name="mensagem" id="mensagem"></textarea>
                <br>
                <input type="submit" name="button" id="button" value="Enviar" />
            </form>
        </div>
    </div>
<?php
include("inc/footer_site.php");
session_destroy();
}
?>
