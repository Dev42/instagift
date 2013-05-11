<?php

include_once '../painel/conf/classLoader.php';
$idItem = $_POST['idItem'];
$quantidade = $_POST['quantidade'];
$action = $_POST['action'];

if($action == 'add'){
   foreach ($_SESSION['InstagiftCarrinho'] as $kChart => $vChart) {
        $obj = unserialize($vChart);
        if ($obj->getIdLocal() == $idItem) {
            $_SESSION['InstagiftCarrinho'][$kChart];
        }
    }  
}else{

}

?>