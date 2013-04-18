<?php

/* Arquivo para login usando instagram! */

include 'config/config.php';
include_once 'inc/header.php';
?>
<div id="bd-geral">
    <h2>Login usando sua conta do Instagram </h2>
<?php
echo "<div class='btnInstaLogin'>";
echo "<a href='https://api.instagram.com/oauth/authorize/?client_id=".$clientId."&redirect_uri=".$redirectResponse."&response_type=code'>Logar com Instagram</a>";
echo "</div>";
echo "<br />";
?>
</div>
<?php
include_once 'inc/footer.php';
?>
