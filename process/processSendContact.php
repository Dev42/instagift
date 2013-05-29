<?php 
	require("../phpmailer/class.phpmailer.php");
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$mensagem = $_POST['mensagem'];
	
	$destinatario = 'contato@instagift.com.br';
	
	$assuntoEmail = "Contato via site";
	
	$conteudoEmail = '<table width="700" border="0" cellspacing="3" cellpadding="5">
  <tr>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3"><strong>Nome:</strong></font></td>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3">'. $nome .'</font></td>
  </tr>
  <tr>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3"><strong>E-mail:</strong></font></td>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3">'. $email .'</font></td>
  </tr>
  <tr>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3"><strong>Telefone:</strong></font></td>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3">'. $telefone .'</font></td>
  </tr>
  <tr>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3"><strong>Mensagem:</strong></font></td>
    <td><font face="Arial, Helvetica, sans-serif" color="#333333" size="3">'. $mensagem .'</font></td>
  </tr>
</table>';
	 
	// Inicia a classe PHPMailer
	$mail = new PHPMailer();
	 
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "mail.instagift.com.br"; // Endereço do servidor SMTP
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->Port = 25;
	$mail->Username = 'envio@instagift.com.br'; // Usuário do servidor SMTP
	$mail->Password = 'Envio2013'; // Senha do servidor SMTP
	 
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "envio@instagift.com.br"; // Seu e-mail
	$mail->FromName = "Envio Instagift"; // Seu nome
	 
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress($destinatario);
	 
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
		 
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = $assuntoEmail; // Assunto da mensagem
	$mail->Body = $conteudoEmail;
	
	// Envia o e-mail
	$enviado = $mail->Send();
	 
	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();	
	
	if($enviado){
		echo("<script>
			  alert('Mensagem enviada, em breve respondemos o contato!')
			  window.location = '../index.php';
			  </script>"); 
	}else{
		$erro = $mail->ErrorInfo;
		echo("<script>
			  alert('Ocorreu um erro. Por favor tente novamente mais tarde: $erro')
			  window.location = '../contato.php';
			  </script>"); 
	}
?>