<?php
include_once 'painel/conf/classLoader.php';
include_once 'config/connection.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Instagift - <?php echo $title; ?></title> 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">  
    <link href="css/style_site.css" rel="stylesheet" type="text/css">
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="css/no-theme/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="js/slides.jquery.js"></script>
    <script type="text/javascript" src="js/jquery.instagram.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
</head>
<body>
	<div class="container">
        <div class="row topo">
        	<div class="span12">
            	<div class="logo"><a href="index.php"><img src="images/site/logo-header.png" alt="Instagift - Suas fotos viram presentes"></a></div>
                <div class="menu">
                	<ul class="nav">
                <?php
					if (isset($_SESSION['InstagiftTipoLogin'])){
						if($_SESSION['InstagiftTipoLogin'] == 'Insta'){
                                                    $imgUser = $_SESSION['InstagiftDadosInsta']["data"]["profile_picture"];
                                                    $nomeUser = $_SESSION['InstagiftDadosInsta']["data"]["full_name"];
                                                    $iconeRede = "ico-instagram.png";
						}elseif ($_SESSION['InstagiftTipoLogin'] == 'user'){
                                                    $imgUser = "";
                                                    $nomeUser = $_SESSION['NomeInstagift'];
                                                    $iconeRede = "ico-upload.png";
						}else {
                                                    $imgUser = $_SESSION['InstagiftFotoUserFb']["picture"]["data"]["url"];
                                                    $nomeUser = $_SESSION['InstagiftDadosUserFb']["name"];
                                                    $iconeRede = "ico-facebook.png";
                                                }
				?>
                <li>
                    <?php
                    if ($_SESSION['InstagiftTipoLogin'] == 'user'){
                    ?>
                        <a href="perfil.php" class="active contador">
                    <?php
                    }else{
                    ?>
                        <a href="index.php" class="active contador">
                    <?php
                    }
                    ?>
                        <img src="images/site/<?php echo $iconeRede ?>" alt="Fotos">
                        <br>
                        <span>
                            <?php 
                                if ($_SESSION['InstagiftTipoLogin'] == 'user'){
                                    $usrFoto = new UserFotoController();
                                    $fotosUser = $usrFoto->listAction($_SESSION['IdInstagift']);
                                    echo count($fotosUser);
                                }else {
                                    echo $_SESSION['InstagiftNrFotos']; 
                                }
                            ?>
                        </span>
                    </a>
                </li>
                <li>
                	<?php
                            $chartController = new ChartController();
                            if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
                                $username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
                                $origem = '1';
                            }elseif ($_SESSION['InstagiftTipoLogin'] == 'user'){
                                $username = $_SESSION['NomeInstagift'];
                                $origem = '3';
                            }else {
                                $username = ($_SESSION['InstagiftDadosUserFb']['username']);
                                $origem = '2';
                            }
                            $status = '1';
                            $chartProducts = $chartController->listActionChart($username, $origem, $status);
                            if (count($chartProducts) > 0){
                                $linkCarrinho = "carrinho.php";
                                $txtLinkCarrinho = "<br><span style='font-size:10px; text-decoration:underline; float:right; position:relative; top:-5px;'>Meu carrinho</span>";
                            }else{
                                $linkCarrinho = "index.php";
                                $txtLinkCarrinho = "";
                            }
                        ?>
                    <a href="<?php echo $linkCarrinho; ?>" class="active logado">
                        <?php echo '<img src="'.$imgUser.'" width="30" class="imgUser">'; ?>
                    	<span><?php echo $nomeUser; ?></span><?php echo $txtLinkCarrinho; ?>
                    </a>
                </li>
                <?php
					}
				?>
                        <li><a href="produtos.php" class="<?php echo $menuClass[0]; ?>"><span>PRODUTOS</span></a></li>
                        <li><a href="comocomprar.php" class="<?php echo $menuClass[1]; ?>"><span>COMO COMPRAR</span></a></li>
                <?php
					if(!isset($_SESSION['InstagiftTipoLogin'])){
                ?>
                        <li><a href="login.php" class="last <?php echo $menuClass[1]; ?>"><span>LOGIN</span></a></li> 
                <?php
					}
                ?>
                        <li><a href="contato.php" class="last <?php echo $menuClass[2]; ?>"><span>CONTATO</span></a></li> 
                <?php
                    if (isset($_SESSION['InstagiftTipoLogin'])){
                        if($_SESSION['InstagiftTipoLogin'] == 'Insta'){
                            $linkLogout = "process/processRedirectInsta.php?action=sair";	
                        }elseif($_SESSION['InstagiftTipoLogin'] == 'user'){
                            $linkLogout = "logout.php";
                        }else{
                            $linkLogout = "process/processRedirectFace.php?action=sair";
                        }
                ?>
                        <li><a href="<?php echo $linkLogout ?>"><span>SAIR</span></a></li>
                <?php } ?>
                    </ul>
                </div>
            </div>
        </div> 