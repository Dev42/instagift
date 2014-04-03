<?php

include 'confInstagram.php';

// Variaveis de configuração
if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $geralUrl = "http://localhost/instagift/";
} else {
    $geralUrl = "http://fotu.net.br/site/";
}

require_once $geralUrl.'WebServer/Instagram/Instagram.php';


?>
