<?php

session_start();
error_reporting(E_ERROR);
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';

if (isset($_SESSION['InstagiftTipoLogin'])){
    if ($_SESSION['InstagiftTipoLogin'] == 'user'){

        $userId = $_POST['idUser'];
        $usrFoto = new UserFoto();
        $usrFoto->setUserId($userId);
        $usrFoto->setImage($_FILES['prd_foto']);

        if ($usrFoto->uploadImage()){
            $usrFotoController = new UserFotoController();
            if ($usrFotoController->insertAction($usrFoto)){
                header("Location: ../perfil.php");
            }else {
                echo "Erro ao adicionar nova foto do usuário";
                exit();
            }
        }else {
            echo "Erro ao adicionar nova foto do usuário";
            exit();
        }

    }else {
        header("Location: ../login.php?err=1");
    }
}else {
    header("Location: ../login.php?err=1");
}

?>