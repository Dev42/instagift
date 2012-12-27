<?php

include 'confInstagram.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/WebServer/Instagram/Instagram.php';

// Variaveis de configuração
if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $geralUrl = "http://localhost/instagift/";
} else {
    $geralUrl = "http://instagift.com.br/";
}
?>
