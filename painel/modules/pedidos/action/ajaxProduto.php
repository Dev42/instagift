<?php

include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/classLoader.php';

if(isset($_POST['photoId']) ){
    
    $photoId = explode("_", $_POST['photoId']);
    $photoId = $photoId[1];
    
    $fotoPrdController = new FotoProdutoController();
    
    $prdFoto = $fotoPrdController->listAction($photoId);
    foreach($prdFoto as $k => $v){
        $fotoEnt = new FotoProduto();
        $fotoEnt->fetchEntity($v);
        if ($fotoPrdController->deleteAction($fotoEnt)){
            if ($fotoEnt->removeImage()){
                echo true;
            }
        }else {
            echo false;
        }
        
    }
}
?>