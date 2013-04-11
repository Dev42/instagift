<?php
session_start();
if (isset($_SESSION['LogadoInstagift'])){
	header("Location: perfil.php");
}else{
$menuClass = array("","","");
$title = "Login";
include("inc/header_site.php");
?>
	<div class="row login">
    	<div class="span12"><h1>Faça login para adicionar suas fotos!</h1></div>
    	<div class="span8">
        	<form name="loginForm" class="form-stacked" method="post" action="process/processLogin.php">
				<?php
                if(isset($_GET['err'])){
                    $msgErro = "- Dados Incorretos";
                }else{
                    $msgErro = "";
                }
                ?>
                <label for="login">Login</label>
                <input type="text" name="login" id="login" />
                
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" />
                <br>
                <input type="submit" name="button" id="button" value="Login" />
                <br>
                <a href="cadastro.php">Cadastre-se</a>
            </form>
            
        </div>
    </div>
<?php
include("inc/footer_site.php");
}
?>
