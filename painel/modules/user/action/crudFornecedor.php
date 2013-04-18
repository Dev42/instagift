<?php

include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/classLoader.php';

$op = isset($_GET['op']) ? $_GET['op'] : "listar";

switch ($op) {
    case "novo":
 
        if (isset($_POST)){
            // Se o POST estiver setado
            foreach($_POST as $k => $v){
                $$k = $v;
            }
            if ($login != "" && $nome_empresa != "" && $contato != "" && $telefone != "" && $email != "" && $senha != ""){
                
                // Verifica se o que o que foi enviado não está vazio
                
                $userClass = new User();
        
                $userClass->setNome($nome_empresa);
                $userClass->setContato($contato);
                $userClass->setDdd($telefone_ddd);
                $userClass->setTelefone(str_replace("-", "", $telefone));
                $userClass->setEndereco($endereco);
                $userClass->setObs($observacao);
                $userClass->setLogin($login);
                $userClass->setEmail($email);
                $userClass->setSenha($senha);
                $userClass->setType(3);

                $userController = new UserController();
                
                $userVer = $userController->getFornecedorAction("user_30_username", $login);
                
                if (count($userVer) == 0){
                    if ($userController->insertAction($userClass)){
                        header("Location: $urlUser/listarFornecedor.php?type=success&case=novo");
                    }
                }else {
                    // Erro caso o login já exista!
                    header("Location: $urlUser/listarFornecedor.php?type=error&case=novo&erron=4");
                }
            }else{
                header("Location: $urlUser/listarFornecedor.php?type=error&case=novo&erron=1");
            }
        }else {
            header("Location: $urlUser/listarFornecedor.php?type=error&case=novo&erron=2");
        }

        break;
    case "editar":
        
        if (isset($_POST)){
            // Se o POST estiver setado
            foreach($_POST as $k => $v){
                $$k = $v;
            }
            
            if ($user_10_id != "" && $login != "" && $nome_empresa != "" && $contato != "" && $telefone != "" && $email != ""){
                
                // Verifica se o que o que foi enviado não está vazio
                
                $userClass = new User();
                $userNew = new User();
        
                $userClass->setNome($nome_empresa);
                $userClass->setContato($contato);
                $userClass->setDdd($telefone_ddd);
                $userClass->setTelefone(str_replace("-", "", $telefone));
                $userClass->setEndereco($endereco);
                $userClass->setObs($observacao);
                $userClass->setLogin($login);
                $userClass->setEmail($email);
                $userClass->setSenha($senha);
                $userClass->setType(3);
                $userClass->setId($user_10_id);
                
                $userController = new UserController();

                $userVer = $userController->getFornecedorAction("user_30_username", $login);

                $userRet = $userNew->fetchEntity($userVer[1]);
                
                
                if (count($userVer) == 0 || $userNew->getId() == $userClass->getId()){
                    if ($userController->editAction($userClass)){
                        header("Location: $urlUser/listarFornecedor.php?type=success&case=editar");
                    }
                }else {
                    // Erro caso o login já exista!
                    header("Location: $urlUser/listarFornecedor.php?type=error&case=novo&erron=4");
                }
            }else{
                
                header("Location: $urlUser/listarFornecedor.php?type=error&case=editar&erron=1");
            }
        }else {
            header("Location: $urlUser/listarFornecedor.php?type=error&case=editar&erron=2");
        }
        
        break;
    case "deletar":
        if (isset($_POST)){
            // Se o POST estiver setado
            foreach($_POST as $k => $v){
                $$k = $v;
            }
            
            if ($user_10_id != ""){
                
                // Verifica se o que o que foi enviado não está vazio
                
                $userClass = new User();
        
                $userClass->setId($user_10_id);
                
                $userController = new UserController();
                if ($userController->deleteAction($userClass)){
                    header("Location: $urlUser/listarFornecedor.php?type=success&case=deletar");
                }else {
                    header("Location: $urlUser/listarFornecedor.php?type=error&case=deletar&&erron=1");
                }
                
            }else{
                header("Location: $urlUser/listarFornecedor.php?type=error&case=deletar&erron=1");
            }
        }else {
            header("Location: $urlUser/listarFornecedor.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlUser/listarFornecedor.php");
        
        break;
}

?>