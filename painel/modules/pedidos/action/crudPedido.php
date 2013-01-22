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
            $prd_forn = array_unique($prd_forn);

            $arrayImgs = array();
            foreach ($prd_image as $kImg => $vImg) {
                foreach ($vImg as $kSubImg => $vSubImg) {
                    if ($vSubImg == "") {
                        unset($prd_image[$kImg][$kSubImg]);
                    } else {
                        $arrayImgs[$kSubImg][$kImg] = $vSubImg;
                    }
                }
            }
            echo "<pre>";
            var_dump($arrayImgs);
            echo "</pre>";

            if ($nome != "" && $descCurta != "" && $descCompleta != "" && $valor != "" && $peso != "" && $prazoProducao != "" && $larguraMinima != "" && $alturaMinima != "" && $minimoFotos != "" && count($prd_forn) > 0 && $prd_image["name"][0] != "") {

                $produtoClass = new Produto();
                $produtoController = new ProdutoController();

                $produtoClass->setNome($nome);
                $produtoClass->setDescCurta($descCurta);
                $produtoClass->setDescCompleta($descCompleta);
                $produtoClass->setValor(str_replace(",", ".", $valor));
                $produtoClass->setPeso(str_replace(",", ".", $peso));
                $produtoClass->setPrazoProducao($prazoProducao);
                $produtoClass->setLarguraMinima($larguraMinima);
                $produtoClass->setAlturaMinima($alturaMinima);
                $produtoClass->setMinimoFotos($minimoFotos);

                $produtoId = $produtoController->insertAction($produtoClass);

                if ($produtoId != 0) {

                    // Inserção de fornecedores

                    $prdFornController = new ProdutoFornecedorController();
                    foreach ($prd_forn as $kForn => $vForn) {
                        // Verifica se o fornecedor já existe para esse produto
                        $verForn = $prdFornController->listAction(false, $produtoId, $vForn);
                        if (count($verForn) == 0) {
                            $prdFornClass = new ProdutoFornecedor();
                            $prdFornClass->setIdFornecedor($vForn);
                            $prdFornClass->setIdProduto($produtoId);

                            if ($prdFornController->insertAction($prdFornClass)) {
                                echo "Inseriu!";
                            } else {
                                echo "Deu erro!";
                            }
                        } else {
                            echo "Registro já existe!";
                        }
                    }

                    // Inserção das imagens

                    $prdImageController = new FotoProdutoController();
                    foreach ($arrayImgs as $keyImagem => $valueImagem) {
                        if (array_key_exists("name", $valueImagem)) {
                            $imgProdutoClass = new FotoProduto();
                            $imgProdutoClass->setIdProduto($produtoId);
                            echo "<pre>";
                            var_dump($valueImagem);
                            echo "</pre>";
                            $imgProdutoClass->setUrl($valueImagem);
                            if ($imgProdutoClass->uploadImage() && $prdImageController->insertAction($imgProdutoClass)) {
                                echo "Inseriu e fez upload! ";
                            } else {
                                echo "Deu erro adicionando as imagens!";
                            }
                        }
                    }

                    header("Location: $urlProdutos/listarProduto.php?type=success&case=novo");
                } else {
                    header("Location: $urlProdutos/listarProduto.php?type=error&case=novo&erron=1");
                }
            } else {
                header("Location: $urlProdutos/listarProduto.php?type=error&case=novo&erron=5");
            }
        } else {
            header("Location: $urlProdutos/listarProduto.php?type=error&case=novo&erron=2");
        }

        break;
    case "editar":

        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }
            foreach ($_FILES as $keyImg => $valImg) {
                $$keyImg = $valImg;
            }
            $prd_forn = array_unique($prd_forn);

            $arrayImgs = array();
            foreach ($prd_image as $kImg => $vImg) {
                foreach ($vImg as $kSubImg => $vSubImg) {
                    if ($vSubImg == "") {
                        unset($prd_image[$kImg][$kSubImg]);
                    } else {
                        $arrayImgs[$kSubImg][$kImg] = $vSubImg;
                    }
                }
            }
            if ($produto_10_id != "" && $nome != "" && $descCurta != "" && $descCompleta != "" && $valor != "" && $peso != "" && $prazoProducao != "" && $larguraMinima != "" && $alturaMinima != "" && $minimoFotos != "" && count($prd_forn) > 0) {

                $produtoClass = new Produto();
                $produtoController = new ProdutoController();

                $produtoClass->setId($produto_10_id);
                $produtoClass->setNome($nome);
                $produtoClass->setDescCurta($descCurta);
                $produtoClass->setDescCompleta($descCompleta);
                $produtoClass->setValor(str_replace(",", ".", $valor));
                $produtoClass->setPeso(str_replace(",", ".", $peso));
                $produtoClass->setPrazoProducao($prazoProducao);
                $produtoClass->setLarguraMinima($larguraMinima);
                $produtoClass->setAlturaMinima($alturaMinima);
                $produtoClass->setMinimoFotos($minimoFotos);

                if ($produtoController->editAction($produtoClass)) {

                    // Inserção de fornecedores

                    $prdFornController = new ProdutoFornecedorController();
                    $prdFornController->deleteAllAction($produtoClass->getId());
                    foreach ($prd_forn as $kForn => $vForn) {
                        // Verifica se o fornecedor já existe para esse produto
                        $verForn = $prdFornController->listAction(false, $produtoClass->getId(), $vForn);
                        if (count($verForn) == 0) {
                            $prdFornClass = new ProdutoFornecedor();
                            $prdFornClass->setIdFornecedor($vForn);
                            $prdFornClass->setIdProduto($produtoClass->getId());

                            if ($prdFornController->insertAction($prdFornClass)) {
                                echo "Inseriu!";
                            } else {
                                echo "Deu erro!";
                            }
                        } else {
                            echo "Registro já existe!";
                        }
                    }

                    // Inserção das imagens

                    if (count($arrayImgs) > 0) {
                        $prdImageController = new FotoProdutoController();
                        foreach ($arrayImgs as $keyImagem => $valueImagem) {
                            if (array_key_exists("name", $valueImagem)) {
                                $imgProdutoClass = new FotoProduto();
                                $imgProdutoClass->setIdProduto($produtoClass->getId());
                                echo "<pre>";
                                var_dump($valueImagem);
                                echo "</pre>";
                                $imgProdutoClass->setUrl($valueImagem);
                                if ($imgProdutoClass->uploadImage() && $prdImageController->insertAction($imgProdutoClass)) {
                                    echo "Inseriu e fez upload! ";
                                } else {
                                    echo "Deu erro adicionando as imagens!";
                                }
                            }
                        }
                    }

                    header("Location: $urlProdutos/listarProduto.php?type=success&case=editar");
                } else {
                    header("Location: $urlProdutos/listarProduto.php?type=error&editar=novo&erron=1");
                }
            } else {
                header("Location: $urlProdutos/listarProduto.php?type=error&case=editar&erron=5");
            }
        } else {
            header("Location: $urlProdutos/listarProduto.php?type=error&case=editar&erron=2");
        }

        break;
    case "deletar":
        if (isset($_POST)) {
            // Se o POST estiver setado
            foreach ($_POST as $k => $v) {
                $$k = $v;
            }

            if ($produto_10_id != "") {

                // Verifica se o que o que foi enviado não está vazio

                $produtoClass = new Produto();

                $produtoClass->setId($produto_10_id);

                $produtoController = new ProdutoController();

                if ($userController->deleteAction($produtoClass)) {
                    header("Location: $urlProdutos/listarProduto.php?type=success&case=deletar");
                } else {
                    header("Location: $urlProdutos/listarProduto.php?type=error&case=deletar&&erron=1");
                }
            } else {
                header("Location: $urlProdutos/listarProduto.php?type=error&case=deletar&erron=1");
            }
        } else {
            header("Location: $urlProdutos/listarProduto.php?type=error&case=deletar&erron=2");
        }
        break;
    case "listar":
    default:
        header("Location: $urlProdutos/listarProduto.php");

        break;
}
?>