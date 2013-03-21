<?php
session_start(); 
unset($_SESSION['LogadoInstagift']); 
session_destroy();
header("Location: ../index.php");
?>