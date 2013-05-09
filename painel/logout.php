<?php

include_once 'conf/config.php';

session_destroy();
header("Location: $urlGeral/login.php");

?>