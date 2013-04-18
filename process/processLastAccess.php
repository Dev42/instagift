<?php 
	include_once 'config/connection.php';
	
	function gravarUltimoAcesso($idConta,$tipoConta){
		$idUser = $_SESSION['IdInstagift'];
			
		$gravar = mysql_query("INSERT INTO ultimos_logados (ultimo_30_id_conta, ultimo_10_tipo_conta, user_10_id) VALUES ('$idConta','$tipoConta','$idUser')");
	}
?>