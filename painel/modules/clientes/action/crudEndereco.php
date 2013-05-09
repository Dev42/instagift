<?php

include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/classLoader.php';

$op = isset($_GET['op']) ? $_GET['op'] : "listar";

switch ($op) {
    case "novo":

        if (isset($_POST)) {
            // Se o POST estiver setado

            foreach ($_POST as $k => $v) {
                $$k = $v;
            }
            if ($endereco_endereco != "" || $endereco_cep != "") {

                // Verifica se o que o que foi enviado não está vazio

                $enderecoClass = new Endereco();
                
                $enderecoClass->setId("");
                $enderecoClass->setClienteId($cli_id) ;
                $enderecoClass->setEndereco($endereco_endereco);
                $enderecoClass->setNumero($endereco_numero);
                $enderecoClass->setComplemento($endereco_complemento);
                $enderecoClass->setCidade($endereco_cidade);
                $enderecoClass->setEstado($endereco_estado);
                $enderecoClass->setCep($endereco_cep);
                
                $endController = new EnderecoController();
                
                if ($endController->insertAction($enderecoClass)) {
                    header("Location: $urlClientes/listarEndereco.php?type=success&case=novo");
                }
            } else {

                header("Location: $urlClientes/listarEndereco.php?type=error&case=novo&erron=1");
            }
        } else {
            header("Location: $urlClientes/listarEndereco.php?type=error&case=novo&erron=2");
        }
        break;
    case "editar":

        if (isset($_POST)) {
            // Se o POST estiver setado

            foreach ($_POST as $k => $v) {
                $$k = $v;
            }
            if ($endereco_endereco != "" || $endereco_cep != "") {

                // Verifica se o que o que foi enviado não está vazio

                $enderecoClass = new Endereco();
                
                $enderecoClass->setId($id);
                $enderecoClass->setClienteId($cli_id) ;
                $enderecoClass->setEndereco($endereco_endereco);
                $enderecoClass->setNumero($endereco_numero);
                $enderecoClass->setComplemento($endereco_complemento);
                $enderecoClass->setCidade($endereco_cidade);
                $enderecoClass->setEstado($endereco_estado);
                $enderecoClass->setCep($endereco_cep);
                
                $endController = new EnderecoController();
                
                if ($endController->editAction($enderecoClass)) {
                    header("Location: $urlClientes/listarEndereco.php?type=success&case=editar");
                }
            } else {

                header("Location: $urlClientes/listarEndereco.php?type=error&case=editar&erron=1");
            }
        } else {
            header("Location: $urlClientes/listarEndereco.php?type=error&case=editar&erron=2");
        }
        break;
    case "deletar":
        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($end_10_id != "") {

                // Verifica se o que o que foi enviado não está vazio

                $enderecoClass = new Endereco();

                $enderecoClass->setId($end_10_id);

                $enderecoController = new EnderecoController();
                if ($enderecoController->deleteAction($enderecoClass)) {
                    header("Location: $urlClientes/listarEndereco.php?type=success&case=deletar");
                } else {
                    header("Location: $urlClientes/listarEndereco.php?type=error&case=deletar&&erron=1");
                }
            } else {
                header("Location: $urlClientes/listarEndereco.php?type=error&case=deletar&erron=1");
            }
        } else {
            header("Location: $urlClientes/listarEndereco.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlUser/listar.php");

        break;
}
?>