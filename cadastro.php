<?php
session_start();
if (isset($_SESSION['LogadoInstagift'])){
	header("Location: painel.php");
}else{
$menuClass = array("","","");
$title = "Cadastre-se";
include("inc/header_site.php");
?>
	<div class="row login">
    	<div class="span12"><h1>Faça o cadastro para começar a comprar</h1></div>
    	<div class="span8">
        	<form name="contatoForm" class="form-stacked" method="post" action="process/processCadastro.php">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" />
                
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" />
                
                <label for="login">Login</label>
                <input type="text" name="login" id="login" />
                
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" />
                <br>
                <input type="submit" name="button" id="button" value="Cadastrar" />
            </form>
        </div>
    </div>
<?php
include("inc/footer_site.php");
session_destroy();
}
?>
