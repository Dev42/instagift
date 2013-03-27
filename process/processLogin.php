<?php 
	include_once '../config/connection.php';
	$login = mysql_real_escape_string($_POST['login']);
	$senha = mysql_real_escape_string($_POST['senha']);
	for ($i = 20; $i <= 20; $i++) {
    	$senha = md5($senha);
    }
	$senha = base64_encode($senha);
	
	$logar = mysql_query("SELECT user_10_id,user_30_nome FROM user WHERE user_30_username='$login' AND user_30_password='$senha' AND user_12_active = '1'") or die("erro ao selecionar");
	if(mysql_num_rows($logar) > 0)
	{
		$dados = mysql_fetch_array($logar);
		session_start();
		$_SESSION['LogadoInstagift'] = 's';
		$_SESSION['IdInstagift'] = $dados['user_10_id'];
		$_SESSION['NomeInstagift'] = $dados['user_30_nome'];
		header("Location: ../perfil.php");
	}
	else
	{
		header("Location: ../login.php?err=1");
	}
?>