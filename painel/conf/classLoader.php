<?php

if ($_SERVER['SERVER_ADDR'] == "127.0.0.1" || $_SERVER['SERVER_ADDR'] == "::1"){
    $geralClass = "/instagift/painel/modules";
}else {
    $geralClass = "/site/painel/modules";
}

// Configuração dos módulos

$userClass = $geralClass."/user";
$clientesClass = $geralClass."/clientes";
$servicesClass = $geralClass."/services";
$produtosClass = $geralClass."/produto";
$pedidosClass = $geralClass."/pedidos";
$cuponsClass = $geralClass."/cupons";
$frasesClass = $geralClass."/frases";

/* User Module */
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/entity/User.php';
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/entity/UserFoto.php';
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/controller/UserController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/controller/AdminController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/controller/UserFotoController.php';
/* /User Module */

/* Clientes Module */
# Entity
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/entity/Clientes.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/entity/Contato.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/entity/Endereco.php';
# /Entity

# Controller
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/controller/ClientesController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/controller/ContatoController.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/controller/EnderecoController.php';
# /Controller

include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/util/SimpleImage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/util/ImageCutter.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $clientesClass . '/util/PhotosLoader.php';
/* /Clientes Module */

/* Produto Module */
# Entity
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/entity/Produto.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/entity/ProdutoFornecedor.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/entity/FotoProduto.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/entity/ProdutoInfo.php';
# /Entity

# Controller
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/controller/ProdutoController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/controller/ProdutoFrontController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/controller/ProdutoFornecedorController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/controller/FotoProdutoController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$produtosClass.'/controller/ProdutoInfoController.php';
# /Controller
/* /Produto Module */

/* Pedido Module */
# Entity
include_once $_SERVER['DOCUMENT_ROOT'].$pedidosClass.'/entity/Pedidos.php';
include_once $_SERVER['DOCUMENT_ROOT'].$pedidosClass.'/entity/Chart.php';
# /Entity

# Controller
include_once $_SERVER['DOCUMENT_ROOT'].$pedidosClass.'/controller/PedidosController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$pedidosClass.'/controller/ChartController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$pedidosClass.'/controller/FreteController.php';
# /Controller
/* /Pedido Module */

/* Cupom Module */
# Entity
include_once $_SERVER['DOCUMENT_ROOT'].$cuponsClass.'/entity/Cupom.php';
# /Entity

# Controller
include_once $_SERVER['DOCUMENT_ROOT'].$cuponsClass.'/controller/CupomController.php';
# /Controller
/* /Cupom Module */

/* Frase Module */
# Entity
include_once $_SERVER['DOCUMENT_ROOT'].$frasesClass.'/entity/Frase.php';
include_once $_SERVER['DOCUMENT_ROOT'].$frasesClass.'/entity/FraseUser.php';
# /Entity

# Controller
include_once $_SERVER['DOCUMENT_ROOT'].$frasesClass.'/controller/FraseController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$frasesClass.'/controller/FraseUserController.php';
# /Controller
/* /Frase Module */
?>