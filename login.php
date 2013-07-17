<?php
session_start();
if (isset($_SESSION['LogadoInstagift'])){
	header("Location: painel.php");
}else{
$menuClass = array("","","");
$title = "Cadastre-se";
include("inc/header_site.php");
?>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=379620018818263";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
    <div class="row login">
        <div class="span6">
            <div class="span6">
                <h1 class="blockTitle">Efetuar Login</h1>
                <span class="observation">Caso já seja cadastrado conosco.</span>
            </div>
            <div class="span6">
                <form name="contatoForm" class="form-stacked" method="post" action="process/processLogin.php">
                        <div class="formLine">
                            <label for="login">Login</label>
                            <input type="text" name="login" id="login" />
                        </div>
                        <div class="formLine">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" />
                        </div>
                        <div class="formLine">
                            <input type="submit" name="button" id="button" value="Cadastrar" />
                        </div>
                </form>
                <div class="loginFacebook">
                    <div class="fb-login-button" data-show-faces="false" data-width="300" data-max-rows="1"></div>
                </div>
                <span class="observationLogin">ou</span>
                <div class="loginInstagram">
                    <a href="process/processRedirectFace.php" class="loginInstaBig"></a>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="span6">
                <h1 class="blockTitle">Faça o cadastro para começar a comprar</h1>
                <span class="observation">Preencha os campos abaixo para se cadastrar.</span>
            </div>
            <div class="span6">
                <form name="contatoForm" class="form-stacked" method="post" action="process/processCadastro.php">
                        <div class="formLine">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" />
                        </div>
                        <div class="formLine">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" />
                        </div>
                        <div class="formLine">
                            <label for="login">Login</label>
                            <input type="text" name="login" id="login" />
                        </div>
                        <div class="formLine">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" />
                        </div>
                        <div class="formLine">
                            <input type="submit" name="button" id="button" value="Cadastrar" />
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
include("inc/footer_site.php");
session_destroy();
}
?>
