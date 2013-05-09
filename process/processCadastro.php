<?php
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';

$user = new User();
$cliController = new UserController();

$user->setNome($_POST['nome']);
$user->setContato($_POST['nome']);
$user->setDoc1($_POST['cpf']);
$user->setDoc2($_POST['rg']);
$user->setEmail($_POST['email']);
$user->setDdd($_POST['ddd']);
$user->setTelefone($_POST['telefone']);
$user->setEndereco($_POST['endereco']);
$user->setLogin($_POST['login']);
$user->setSenha($_POST['senha']);

$sqlQuery = "SELECT user_10_id FROM user WHERE user_30_username='".$user->getLogin()."'";
$logar = mysql_query($sqlQuery);

if (mysql_num_rows($logar) > 0) {
    header("Location: ../cadastro.php?err=1");
}

if ($cliController->insertAction($user)){
    $logar = mysql_query("SELECT user_10_id,user_30_nome FROM user WHERE user_30_username='".$user->getLogin()."' AND user_30_password='".$user->encriptPassword()."' AND user_12_active = '1'");
    if(mysql_num_rows($logar) > 0)
    {
        $dados = mysql_fetch_array($logar);
        session_start();
        $_SESSION['LogadoInstagift'] = 's';
        $_SESSION['IdInstagift'] = $dados['user_10_id'];
        $_SESSION['NomeInstagift'] = $dados['user_30_nome'];
        header("Location: ../perfil.php");
    }else{
        header("Location: ../login.php?err=1");
    }
}else {
    header("Location: ../cadastro.php?err=1");
}
?>
