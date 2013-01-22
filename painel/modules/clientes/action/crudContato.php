<?php

include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/classLoader.php';

$op = isset($_GET['op']) ? $_GET['op'] : "listar";

switch ($op) {
    case "novo":

        if (isset($_POST)) {
            // Se o POST estiver setado

            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            foreach ($_POST as $k => $v) {
                $$k = $v;
            }
            if ($contato_nome != "" && ($contato_telefone != "" || $contato_email != "")) {

                // Verifica se o que o que foi enviado não está vazio

                $contatoClass = new Contato();
                
                $contatoClass->setId("");
                $contatoClass->setDdd($contato_ddd);
                $contatoClass->setTel($contato_telefone);
                $contatoClass->setClienteId($cli_id);
                $contatoClass->setNome($contato_nome);
                $contatoClass->setEmail($contato_email);
                $contatoClass->setTipo($contato_tipo);

                $cntController = new ContatoController();
                
                if ($cntController->insertAction($contatoClass)) {
                    header("Location: $urlClientes/listarContato.php?type=success&case=novo");
                }
            } else {

                header("Location: $urlClientes/listarContato.php?type=error&case=novo&erron=1");
            }
        } else {
            header("Location: $urlClientes/listar.php?type=error&case=novo&erron=2");
        }

        break;
    case "editar":

        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($contato_nome != "" && ($contato_telefone != "" || $contato_email != "")) {

                // Verifica se o que o que foi enviado não está vazio

                $contatoClass = new Contato();
                
                $contatoClass->setId($id);
                $contatoClass->setDdd($contato_ddd);
                $contatoClass->setTel($contato_telefone);
                $contatoClass->setClienteId($cli_id);
                $contatoClass->setNome($contato_nome);
                $contatoClass->setEmail($contato_email);
                $contatoClass->setTipo($contato_tipo);

                $cntController = new ContatoController();
                
                if ($cntController->editAction($contatoClass)) {
                    header("Location: $urlClientes/listarContato.php?type=success&case=editar");
                }
            } else {

                header("Location: $urlClientes/listarContato.php?type=error&case=editar&erron=1");
            }
        } else {
            header("Location: $urlClientes/listarContato.php?type=error&case=editar&erron=2");
        }

        break;
    case "deletar":
        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($cnt_10_id != "") {

                // Verifica se o que o que foi enviado não está vazio

                $contatoClass = new Contato();

                $contatoClass->setId($cnt_10_id);

                $contatoController = new ContatoController();
                if ($contatoController->deleteAction($contatoClass)) {
                    header("Location: $urlClientes/listarContato.php?type=success&case=deletar");
                } else {
                    header("Location: $urlClientes/listarContato.php?type=error&case=deletar&&erron=1");
                }
            } else {
                header("Location: $urlClientes/listarContato.php?type=error&case=deletar&erron=1");
            }
        } else {
            header("Location: $urlClientes/listarContato.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlUser/listar.php");

        break;
}
?>