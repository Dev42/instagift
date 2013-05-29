<?php

if ($_SERVER['SERVER_ADDR'] == "127.0.0.1"){ 
    $geralClass = "/instagift/painel/modules";
}else if($_SERVER['SERVER_ADDR'] == "::1"){ //Fix para IP v6 que o MAMP usa
	$geralClass = "/instagift/painel/modules";
}else {
    $geralClass = "/instagift/painel/modules";
}

// Configuração dos módulos

$userClass = $geralClass."/user";
$clientesClass = $geralClass."/clientes";
$servicesClass = $geralClass."/services";
$produtosClass = $geralClass."/produto";
$pedidosClass = $geralClass."/pedidos";

/* User Module */
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/entity/User.php';
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/controller/UserController.php';
include_once $_SERVER['DOCUMENT_ROOT'].$userClass.'/controller/AdminController.php';
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
/* /Produto Module */
?>