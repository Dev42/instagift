<?php

include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/classLoader.php';

$op = isset($_GET['op']) ? $_GET['op'] : "listar";

switch ($op) {
    case "novo":

        if (isset($_POST)) {
            // Se o POST estiver setado

            /* echo "<pre>";
              print_r($_POST);
              echo "</pre>"; */

            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            $clienteClass = new Clientes();
            $contatoClass = new Contato();
            $enderecoClass = new Endereco();

            $clienteClass->setUserId($user_id);
            $clienteClass->setNome($nome);
            $clienteClass->setDoc1($doc1);
            $clienteClass->setDoc2($doc2);
            $clienteClass->setDoc3($doc3);
            $clienteClass->setTipo($cli_tipo);
            $clienteClass->setObsCom(nl2br($obs_com));
            $clienteClass->setObsTec(nl2br($obs_tec));
            $clienteClass->setAtivo($cli_ativo);
            $clienteClass->setSite($cli_site);
            $clienteClass->setBlog($cli_blog);
            $clienteClass->setTwitter($cli_twitter);
            $clienteClass->setFacebook($cli_facebook);
            $clienteClass->setAnalitycs($cli_analytics);

            $clienteClass->setFile($_FILES['cli_logo']);

            $cliController = new ClientesController();
            $cntController = new ContatoController();
            $endController = new EnderecoController();

            if ($clienteClass->uploadImage() && $cliController->insertAction($clienteClass)) {

                $idCli = mysql_insert_id();

                foreach ($contato_nome as $k => $v) {

                    if ($contato_nome[$k] != "" && ($contato_tel[$k] != "" || $contato_email[$k] != "")) {

                        $contatoClass->setClienteId($idCli);
                        $contatoClass->setNome($contato_nome[$k]);
                        $contatoClass->setDdd($contato_ddd[$k]);
                        $contatoClass->setTel($contato_tel[$k]);
                        $contatoClass->setEmail($contato_email[$k]);
                        $contatoClass->setTipo($contato_tipo[$k]);

                        if ($cntController->insertAction($contatoClass)) {
                            
                        } else {
                            // Erro ao adicionar contato
                            header("Location: $urlClientes/listar.php?type=error&case=novo&erron=3");
                        }
                    }
                }

                foreach ($endereco_endereco as $key => $val) {

                    if ($endereco_endereco[$key] != "" || $endereco_cep[$key] != "") {

                        $enderecoClass->setClienteId($idCli);
                        $enderecoClass->setEndereco($endereco_endereco[$key]);
                        $enderecoClass->setNumero($endereco_numero[$key]);
                        $enderecoClass->setComplemento($endereco_complemento[$key]);
                        $enderecoClass->setCidade($endereco_cidade[$key]);
                        $enderecoClass->setEstado($endereco_estado[$key]);
                        $enderecoClass->setCep($endereco_cep[$key]);

                        if ($endController->insertAction($enderecoClass)) {
                            
                        } else {
                            // Erro ao adicionar endereço
                            header("Location: $urlClientes/listar.php?type=error&case=novo&erron=3");
                        }
                    }
                }
                header("Location: $urlClientes/listar.php?type=success&case=novo");
            } else {
                // Erro ao adicionar cliente
                header("Location: $urlClientes/listar.php?type=error&case=novo&erron=2");
            }
        } else {

            // Erro ao processar o formulário
            header("Location: $urlClientes/listar.php?type=error&case=novo&erron=1");
        }

        break;
    case "editar":

        if (isset($_POST)) {
            // Se o POST estiver setado

            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            $clienteClass = new Clientes();
            $contatoClass = new Contato();
            $enderecoClass = new Endereco();

            $clienteClass->setId($cli_id);
            $clienteClass->setUserId($user_id);
            $clienteClass->setNome($nome);
            $clienteClass->setDoc1($doc1);
            $clienteClass->setDoc2($doc2);
            $clienteClass->setDoc3($doc3);
            $clienteClass->setTipo($cli_tipo);
            $clienteClass->setObsCom(nl2br($obs_com));
            $clienteClass->setObsTec(nl2br($obs_tec));
            $clienteClass->setAtivo($cli_ativo);
            $clienteClass->setSite($cli_site);
            $clienteClass->setBlog($cli_blog);
            $clienteClass->setTwitter($cli_twitter);
            $clienteClass->setFacebook($cli_facebook);
            $clienteClass->setAnalitycs($cli_analytics);

            $clienteClass->setFile($_FILES['cli_logo']);
            $clienteClass->setImage($cli_image);

            $cliController = new ClientesController();
            $cntController = new ContatoController();
            $endController = new EnderecoController();

            if ( $cliController->editAction($clienteClass)) {

                if ($_FILES['cli_logo']['tmp_name'] != "") {

                    if (!$clienteClass->uploadImage()){
                        // Erro ao adicionar imagem
                        header("Location: $urlClientes/listar.php?type=error&case=novo&erron=5");
                    }else {
                        $cliController->editAction($clienteClass);
                    }
                }

                $cliIdAr = array();
                $cliArray = $cntController->listAction(false, $contatoClass->getClienteId());
                foreach ($cliArray as $k => $v){
                    $cliIdAr[$v->getId()] = $v->getId();
                }
                
                foreach ($contato_nome as $k => $v) {

                    if ($contato_nome[$k] != "" && ($contato_tel[$k] != "" || $contato_email[$k] != "")) {

                        $contatoClass->setClienteId($cli_id);
                        $contatoClass->setNome($contato_nome[$k]);
                        $contatoClass->setDdd($contato_ddd[$k]);
                        $contatoClass->setTel($contato_tel[$k]);
                        $contatoClass->setEmail($contato_email[$k]);
                        $contatoClass->setTipo($contato_tipo[$k]);
                        
                        if (isset($contato_id[$k]) && $contato_id[$k] != ""){
                        
                            $contatoClass->setId($contato_id[$k]);
                            $controleContato = $cntController->editAction($contatoClass);
                            if (!$controleContato) {
                                // Erro ao editar contato
                                header("Location: $urlClientes/listar.php?type=error&case=novo&erron=4");
                            }
                            
                            unset($cliIdAr[$contatoClass->getId()]);
                        
                        }else {
                            $contatoClass->setId("");
                            $controleContato = $cntController->insertAction($contatoClass);
                            if (!$controleContato) {
                                // Erro ao adicionar contato
                                header("Location: $urlClientes/listar.php?type=error&case=novo&erron=4");
                            }else {
                                echo "Contato inserido com sucesso!";
                            }
                        }
                    }
                }

                foreach ($cliIdAr as $keyCnt => $valueCnt){
                    $cntClassDel = new Contato();
                    $cntClassDel->setId($valueCnt);
                    $cntController->deleteAction($cntClassDel);
                }
                
                $endIdAr = array();
                $cliArray = $endController->listAction(false, $enderecoClass->getClienteId());
                foreach ($cliArray as $keyEnd => $valueEnd){
                    $endIdAr[$valueEnd->getId()] = $valueEnd->getId();
                }
                
                foreach ($endereco_endereco as $key => $val) {

                    if ($endereco_endereco[$key] != "" || $endereco_cep[$key] != "") {

                        $enderecoClass->setClienteId($cli_id);
                        $enderecoClass->setEndereco($endereco_endereco[$key]);
                        $enderecoClass->setNumero($endereco_numero[$key]);
                        $enderecoClass->setComplemento($endereco_complemento[$key]);
                        $enderecoClass->setCidade($endereco_cidade[$key]);
                        $enderecoClass->setEstado($endereco_estado[$key]);
                        $enderecoClass->setCep($endereco_cep[$key]);

                        if (isset($endereco_id[$key]) && $endereco_id[$key] != ""){
                        
                            $enderecoClass->setId($endereco_id[$key]);
                            $controleEndereco = $endController->editAction($enderecoClass);
                            if (!$controleEndereco) {
                                // Erro ao editar endereco
                                header("Location: $urlClientes/listar.php?type=error&case=novo&erron=3");
                            }
                            
                            unset($endIdAr[$enderecoClass->getId()]);
                        
                        }else {
                            $enderecoClass->setId("");
                            $controleEndereco = $endController->insertAction($enderecoClass);
                            if (!$controleEndereco) {
                                // Erro ao adicionar contato
                                header("Location: $urlClientes/listar.php?type=error&case=novo&erron=4");
                            }
                            
                        }
                        
                    }
                }
                
                foreach ($endIdAr as $keyEnd => $valueEnd){
                    $endClassDel = new Endereco();
                    $endClassDel->setId($valueEnd);
                    $endController->deleteAction($endClassDel);
                }
                header("Location: $urlClientes/listar.php?type=success&case=editar");
            } else {
                // Erro ao adicionar cliente
                header("Location: $urlClientes/listar.php?type=error&case=novo&erron=2");
            }
        } else {

            // Erro ao processar o formulário
            header("Location: $urlClientes/listar.php?type=error&case=novo&erron=1");
        }

        break;
    case "deletar":
        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($cli_10_id != "") {

                // Verifica se o que o que foi enviado não está vazio

                $clienteClass = new Clientes();

                $clienteClass->setId($cli_10_id);

                $clienteController = new ClienteController();
                if ($clienteController->deleteAction($clienteClass)) {
                    header("Location: $urlClientes/listar.php?type=success&case=deletar");
                } else {
                    header("Location: $urlClientes/listar.php?type=error&case=deletar&&erron=1");
                }
            } else {
                header("Location: $urlClientes/listar.php?type=error&case=deletar&erron=1");
            }
        } else {
            header("Location: $urlClientes/listar.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlClientes/listar.php");

        break;
}
?>