<?php
session_start();
error_reporting(E_ERROR);
$menuClass = array("","","active");
$title = "Contato";
include("inc/header_site.php");
?>
	<div class="row login">
        <form name="contatoForm" class="form-stacked fecharPedido" method="post" action="process/processSendContact.php">
            <div class="span12"><h1 style="text-transform:uppercase;">Contato</h1></div>
            <div class="span11 dados" style="width:560px;">
            	<div class="field">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" />
                </div>
                <div class="field">    
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" />
                </div>
                <br style="clear:both;" />
                <div class="field">    
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" />
                </div>
                <div class="field">    
                    <label for="mensagem">Mensagem</label>
                    <textarea name="mensagem" id="mensagem"></textarea>
                </div>
            </div>
            <br style="clear:both;" />
            <input type="button" onclick="validaFormContato()" name="button" id="button" class="enviarContato" value="Enviar" style="float:right; margin-right:395px;" />
        </form>
    </div>
<?php
include("inc/footer_site.php");
?>
