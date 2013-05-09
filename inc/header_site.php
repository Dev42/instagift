<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Instagift - <?php echo $title; ?></title> 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />  
    <link href="css/style_site.css" rel="stylesheet" type="text/css" />
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/ajaxUserName.js"></script>
    <script type="text/javascript" src="js/slides.jquery.js"></script>
    <script type="text/javascript" src="js/jquery.instagram.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
</head>
<body>
	<div class="container">
        <div class="row topo">
        	<div class="span12">
            	<div class="logo"><a href="index.php"><img src="images/site/logo-header.png" alt="Instagift - Suas fotos viram presentes"></a></div>
                <div class="menu">
                	<ul id="nav">
                <?php
					if (isset($_SESSION['InstagiftTipoLogin'])){
						if($_SESSION['InstagiftTipoLogin'] == 'Insta'){
				?>
                <li>
                	<a href="index.php" class="active contador">
						<img src="images/site/ico-instagram.png" alt="Fotos - Instagram">
                        <br>
                        <span><?php echo $_SESSION['InstagiftNrFotos']; ?></span>
                    </a>
                </li>
                <li>
                	<a href="index.php" class="active logado">
						<?php echo '<img src="'.$_SESSION['InstagiftDadosInsta']["data"]["profile_picture"].'" width="30">'; ?>
                    	<span><?php echo $_SESSION['InstagiftDadosInsta']["data"]["full_name"]; ?></span>
                    </a>
                </li>
                <?php
						}else{
				?>
                <li>
                	<a href="index.php" class="active contador">
						<img src="images/site/ico-facebook.png" alt="Fotos - Facebook">
                        <br>
                        <span><?php echo $_SESSION['InstagiftNrFotos']; ?></span>
                    </a>
                </li>
                <li>
                	<a href="index.php" class="active logado">
						<?php echo '<img src="'.$_SESSION['InstagiftFotoUserFb']["picture"]["data"]["url"].'" width="30">'; ?>
                        <span><?php echo $_SESSION['InstagiftDadosUserFb']["name"]; ?></span>
                    </a>
                </li>
                <?php
						}
					}
				?>
                        <li><a href="produtos.php" class="<?php echo $menuClass[0]; ?>"><span>PRODUTOS</span></a></li>
                        <li><a href="comocomprar.php" class="<?php echo $menuClass[1]; ?>"><span>COMO COMPRAR</span></a></li>
                        <li><a href="contato.php" class="last <?php echo $menuClass[2]; ?>"><span>CONTATO</span></a></li> 
                <?php
					if (isset($_SESSION['LogadoInstagift'])){
				?>
                		<li><a href="process/processLogout.php"><span>SAIR</span></a></li>
                <?php } ?>
                    </ul>
                </div>
            </div>
        </div> 