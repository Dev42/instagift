<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Instagift - <?php echo $title; ?></title> 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />  
    <link href="css/style_site.css" rel="stylesheet" type="text/css" />  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/slides.jquery.js"></script>
</head>
<body>
	<div class="container">
        <div class="row topo">
        	<div class="span12">
            	<div class="logo"><a href="index.php"><img src="images/site/logo-header.png" alt="Instagift - Suas fotos viram presentes"></a></div>
                <?php 
					session_start();
					if (isset($_SESSION['LogadoInstagift'])){
				?>
                 <div class="menu login">
                	<ul id="nav">
                    	<li><a href="perfil.php" class="active"><span><?php echo $_SESSION['NomeInstagift'] ?><br><u>PERFIL</u></span></a></li>
                <?php }else{ ?>
                <div class="menu">
                	<ul id="nav">
                    	<li><a href="login.php"><span>LOGIN</span></a></li>
                <?php } ?>
                        <li><a href="produtos.php" class="<?php echo $menuClass[0]; ?>"><span>PRODUTOS</span></a></li>
                        <li><a href="#" class="<?php echo $menuClass[1]; ?>"><span>COMO COMPRAR</span></a></li>
                        <li><a href="#" class="last <?php echo $menuClass[2]; ?>"><span>CONTATO</span></a></li> 
                <?php 
					session_start();
					if (isset($_SESSION['LogadoInstagift'])){
				?>
                		<li><a href="process/processLogout.php"><span>SAIR</span></a></li>
                <?php } ?>
                    </ul>
                </div>
            </div>
        </div> 