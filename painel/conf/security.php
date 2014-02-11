<?php

session_start();

include_once $_SERVER['DOCUMENT_ROOT'].'/site/painel/conf/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/site/painel/conf/connection.php';

if ((isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "")) {
    $userName = $_POST['username'];
    $passwordCru = $_POST['password'];
    
    $passwordMd5 = md5($passwordCru);

    $password = base64_encode($passwordMd5);
} else {
    header("Location: $urlGeral/login.php?ver=false&error=1");
}

$userName = str_replace("\"", "", addslashes($userName));
$userName = str_replace("'", "", addslashes($userName));
$userName = str_replace("\\", "", addslashes($userName));

$qry = "SELECT * FROM user WHERE user_30_username = '" . $userName . "' AND user_30_password = '" . $password . "' AND user_12_active = 1";
$result = mysql_query($qry);

if (mysql_num_rows($result) > 0) {

    while ($row = mysql_fetch_assoc($result)) {

        $_SESSION['loginUser'] = $row['user_30_username'];
        $_SESSION['loginSecret'] = $row['user_30_password'];
        $_SESSION['loginVer'] = $row['user_12_active'];
    }
    
}else {
    
    header("Location: $urlGeral/login.php?ver=false&error=3");
    
}

header("Location: $urlGeral/index.php");
?>