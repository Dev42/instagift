<?php

if ($_SERVER['SERVER_ADDR'] == "127.0.0.1" || $_SERVER['SERVER_ADDR'] == "::1"){
    $dataBase = "fotu_net_br";
    $host = "localhost";
    $user = "fotu_live";
    $pass = "N2-EH^jh";
}else {
    $dataBase = "fotu_net_br";
    $host = "mysql.fotu.net.br";
    $user = "fotu_live";
    $pass = "N2-EH^jh";
}

$conn = mysql_connect($host, $user, $pass);

if (!$conn){
    die ("Erro ao estabelecer conexão com o banco de dados! " . mysql_errno() . ": " . mysql_error());
}

$db_selected = mysql_select_db($dataBase, $conn);

if (!$db_selected){
    die ("Erro ao selecionar banco de dados!");
}

?>