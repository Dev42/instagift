<?php

session_start();

include $_SERVER['DOCUMENT_ROOT'].'/painel/conf/connection.php';

if ($_SERVER['SERVER_ADDR'] == "127.0.0.1" || $_SERVER['SERVER_ADDR'] == "::1"){ //Fix para IP v6 que o MAMP usa
    $urlGeral = "http://localhost/instagift/painel";
}else {
    $urlGeral = "http://instagift.com.br/painel";
}

$urlModules = $urlGeral."/modules";

/* Modules */
$urlUser = $urlModules."/user";
$urlProdutos = $urlModules."/produto";
$urlClientes = $urlModules."/clientes";
$urlServices = $urlModules."/services";
$urlPedidos = $urlModules."/pedidos";
/* /Modules */

if (isset($_SESSION['loginVer']) && $_SESSION['loginVer'] == 1 && $_SESSION['loginUser'] != "" && $_SESSION['loginSecret'] != "") {
    $userName = $_SESSION['loginUser'];
    $password = $_SESSION['loginSecret'];
}else {
    header("Location: $urlGeral/login.php?ver=false&error=2");
}

$qry = "SELECT * FROM user WHERE user_30_username = '" . $userName . "' AND user_30_password = '" . $password . "' AND user_12_active = 1";
$result = mysql_query($qry);

if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {

        $_SESSION['loginUser'] = $row['user_30_username'];
        $_SESSION['loginSecret'] = $row['user_30_password'];
        $_SESSION['loginVer'] = $row['user_12_active'];
        $_SESSION['loginType'] = $row['user_12_type'];
        $_SESSION['loginId'] = $row['user_10_id'];
    }
}else {
    header("Location: $urlGeral/login.php?ver=false&error=3");
}

?>