<?php

include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/conf/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/conf/classLoader.php';

$op = isset($_GET['op']) ? $_GET['op'] : "listar";

switch ($op) {
    case "novo":

        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }
            
            if ($valor != "" && $validade != "") {

                $cupomClass = new Cupom();
                $cupomController = new CupomController();

                $cupomClass->setCodigo($cupomController->gerarCodigoCupom());
                $cupomClass->setValor($valor);
				$validadeFormat = mktime(23, 59, 59, date('m', strtotime($validade)), date('d', strtotime($validade)), date('Y', strtotime($validade)));
                $cupomClass->setValidade($validadeFormat);
                $cupomClass->setStatus(0);
				
                $cupomId = $cupomController->insertAction($cupomClass);

                if ($cupomId != 0) {
                    header("Location: $urlCupons/listarCupom.php?type=success&case=novo");
                } else {
                    header("Location: $urlCupons/listarCupom.php?type=error&case=novo&erron=1");
                }
            } else {
                header("Location: $urlCupons/listarCupom.php?type=error&case=novo&erron=5");
            }
        } else {
            header("Location: $urlCupons/listarCupom.php?type=error&case=novo&erron=2");
        }

        break;
    case "editar":

        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }
            if ($valor != "" && $validade != "") {

                $cupomClass = new Cupom();
                $cupomController = new CupomController();
				
				$cupomClass->setId($id);
                $cupomClass->setCodigo($cupomController->gerarCodigoCupom());
                $cupomClass->setValor($valor);
				$validadeFormat = mktime(23, 59, 59, date('m', strtotime($validade)), date('d', strtotime($validade)), date('Y', strtotime($validade)));
                $cupomClass->setValidade($validadeFormat);
                $cupomClass->setStatus(0);
				
                if($cupomId = $cupomController->editAction($cupomClass)){
                    header("Location: $urlCupons/listarCupom.php?type=success&case=editar");
                } else {
                    header("Location: $urlCupons/listarCupom.php?type=error&case=editar&erron=1");
                }
            } else {
                header("Location: $urlCupons/listarCupom.php?type=error&case=editar&erron=5");
            }
        } else {
            header("Location: $urlCupons/listarCupom.php?type=error&case=editar&erron=2");
        }

        break;
    case "deletar":
        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($cupom_10_id != "") {

                // Verifica se o que o que foi enviado não está vazio

                $cupomClass = new Cupom();

                $cupomClass->setId($cupom_10_id);

                $cupomController = new CupomController();

                if ($cupomController->deleteAction($cupomClass)) {
                    header("Location: $urlCupons/listarCupom.php?type=success&case=deletar");
                } else {
                    header("Location: $urlCupons/listarCupom.php?type=error&case=deletar&erron=1");
                }
            } else {
                header("Location: $urlCupons/listarCupom.php?type=error&case=deletar&erron=5");
            }
        } else {
            header("Location: $urlCupons/listarCupom.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlCupons/listarCupom.php");

        break;
}
?>