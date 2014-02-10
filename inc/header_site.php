<?php
include_once 'painel/conf/classLoader.php';
include_once 'config/connection.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Fotu - <?php echo $title; ?></title>
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
        <div class="row-fluid topo">
        	<div class="span4">
            	<div class="logo"><a href="index.php"><img src="images/site/logo-header.png" alt="Fotu - Suas fotos viram presentes"></a></div>
            </div>
            <div class="span8">
                <div class="menuSocial">
                    <ul class="nav">
                        <li><a href="#" class="facebook"></a></li>
                        <li><a href="#" class="twitter"></a></li>
                        <li><a href="#" class="instagram"></a></li>
                        <li><a href="#" class="pinterest"></a></li>
                        <li><a href="#" class="mail"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row-fluid altLeft">
                <div class="menu">
                	<ul class="nav">

                        <li><a href="comocomprar.php" class="<?php echo $menuClass[1]; ?>"><span>Como Comprar</span></a></li>
                        <li><a href="produtos.php" class="<?php echo $menuClass[0]; ?>"><span>Produtos</span></a></li>
                        <li><a href="contato.php" class="last <?php echo $menuClass[2]; ?>"><span>Contato</span></a></li>
                <?php
                    if(!isset($_SESSION['InstagiftTipoLogin'])){
                ?>
                        <li><a href="login.php" class="last <?php echo $menuClass[1]; ?>"><span>Login</span></a></li>
                <?php
                    }
                ?>
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
                        <li><a href="<?php echo $linkLogout ?>"><span>Sair</span></a></li>





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
                        $temCarrinho = true;
                    }else{
                        $temCarrinho = false;
                    }
                ?>
                <div class="itensRight">
                <?php
                    if($temCarrinho){
                        echo '<li><a href="carrinho.php" class="'.$menuClass[3].'"><span>Meu Carrinho</span></a></li>';
                    }
                ?>
                <li>
                    <a href="" class="active logado">
                        <?php echo '<img src="'.$imgUser.'" width="24" class="imgUser">'; ?>
                        <span><?php echo $nomeUser; ?></span><?php echo $txtLinkCarrinho; ?>
                    </a>
                </li>
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
                </div>
                <?php
                    }
                ?>
                <?php } ?>
                    </ul>
                </div>
            </div>