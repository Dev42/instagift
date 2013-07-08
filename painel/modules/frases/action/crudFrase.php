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
            foreach ($_FILES as $keyImg => $valImg) {
                $$keyImg = $valImg;
            }

            if ($nome != "" && array_key_exists("name", $imgFrase)) {
                $fraseClass = new Frase();
                $fraseController = new FraseController();

                $fraseClass->setNome($nome);

                if (array_key_exists("name", $imgFrase)) {
                    $fraseClass->setUrl($imgFrase);
                    if ($fraseClass->uploadImage()) {
                        echo "Inseriu e fez upload!";
                    } else {
                        echo "Erro";
                    }
                }

                $fraseId = $fraseController->insertAction($fraseClass);

                if ($fraseId != 0) {
                    header("Location: $urlFrases/listarFrase.php?type=success&case=novo");
                } else {
                    header("Location: $urlFrases/listarFrase.php?type=error&case=novo&erron=1");
                }
            } else {
                header("Location: $urlFrases/listarFrase.php?type=error&case=novo&erron=5");
            }
        } else {
            header("Location: $urlFrases/listarFrase.php?type=error&case=novo&erron=2");
        }

        break;
    case "deletar":
        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($frase_10_id != "") {

                // Verifica se o que o que foi enviado não está vazio

                $fraseClass = new Frase();

                $fraseClass->setId($frase_10_id);

                $fraseController = new FraseController();

                if ($fraseController->deleteAction($fraseClass)) {
                    header("Location: $urlFrases/listarFrase.php?type=success&case=deletar");
                } else {
                    header("Location: $urlFrases/listarFrase.php?type=error&case=deletar&erron=1");
                }
            } else {
                header("Location: $urlFrases/listarFrase.php?type=error&case=deletar&erron=5");
            }
        } else {
            header("Location: $urlFrases/listarFrase.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlFrases/listarFrase.php");

        break;
}
?>