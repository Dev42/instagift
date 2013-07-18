<?php

session_start();
unset($_SESSION["LogadoInstagift"]);
unset($_SESSION["InstagiftTipoLogin"]);
unset($_SESSION["IdInstagift"]);
unset($_SESSION["NomeInstagift"]);

header("Location: index.php");

?>
