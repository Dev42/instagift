<?php

include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';

$user = new User();

$user->setLogin(mysql_real_escape_string($_POST['login']));
$user->setSenha(mysql_real_escape_string($_POST['senha']));

$logar = mysql_query("SELECT user_10_id,user_30_nome FROM user WHERE user_30_username='".$user->getLogin()."' AND user_30_password='".$user->encriptPassword()."' AND user_12_active = '1'");
if(mysql_num_rows($logar) > 0)
{
    $dados = mysql_fetch_array($logar);
    session_start();
    $_SESSION['LogadoInstagift'] = 's';
    $_SESSION['InstagiftTipoLogin'] = 'user';
    $_SESSION['IdInstagift'] = $dados['user_10_id'];
    $_SESSION['NomeInstagift'] = $dados['user_30_nome'];
    header("Location: ../perfil.php");
}else{
    header("Location: ../login.php?err=1");
}

?>