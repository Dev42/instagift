<?php

include_once 'config/connection.php';
$login = $_POST['login'];

$sqlQuery = "SELECT user_10_id FROM user WHERE user_30_username='".$login."'";
$logar = mysql_query($sqlQuery);

if (mysql_num_rows($logar) > 0) {
    echo 1;
}else {
    echo 0;
}

?>