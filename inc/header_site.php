<?php
include("inc/conexao.php");
$selecionaTextos = mysql_query("SELECT * FROM textos WHERE codTextos = '1'");
$textos = mysql_fetch_array($selecionaTextos);
$telefone = nl2br($textos['telefone']);
$endereco = nl2br($textos['endereco']);
$email = nl2br($textos['email']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>RP Plass - <?=$title?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />    
    <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="main">
        <div id="topoSite">
            <div id="logo">
                <img src="images/logo.png" border="0" alt="Logo RP Plass" />
            </div>
            <div id="menu">
            	<ul id="nav">
                	<li class="top"><a href="index.php" class="<?=$pagina[0]?>"><span>HOME</span></a></li>
                    <li class="top"><a href="empresa.php" class="<?=$pagina[1]?>"><span>EMPRESA</span></a></li> 
                    <li class="top"><a href="produtos.php" class="<?=$pagina[2]?>"><span>PRODUTOS</span></a>
                        <ul id="subNav">
                        	<?php
								$contProdMenu = 0;
								$selecionaProdutosMenu = mysql_query("SELECT codProduto,nome FROM produtos WHERE ativo = 1 ORDER BY codCategoria,nome");
								while($dadosProdutosMenu = mysql_fetch_array($selecionaProdutosMenu)){
									$contProdMenu++;
									$nomeProdMenu = $dadosProdutosMenu['nome'];
									$codProdMenu = $dadosProdutosMenu['codProduto'];
									if($contProdMenu == 1){
										 $menuClass = "firstItem";
									}else if($contProdMenu == mysql_num_rows($selecionaProdutosMenu)){
										$menuClass = "lastItem";
									}else{
										$menuClass = "normalItem";
									}
							?>
                        	<li><a href="produtoInfo.php?pid=<?=$codProdMenu?>" class="<?=$menuClass?>"><span><?=$nomeProdMenu?></span></a></li>
                            <?php
								}
							?>
                        </ul>
                    </li>
                    <li class="top"><a href="clientes.php" class="<?=$pagina[3]?>"><span>CLIENTES</span></a></li>
                    <li class="top"><a href="contato.php" class="<?=$pagina[4]?>"><span>CONTATO</span></a></li>    
                </ul>
            </div>
            <div id="contato">
            	<div id="txtTelefone"><span><?=$telefone?></span></div>
            	<div id="txtEndereco"><span><?=$endereco?></span></div>           
                <div id="txtEmail"><a href="mailto:<?=$email?>" target="_blank"><?=$email?></a></div>
            </div>
        </div>