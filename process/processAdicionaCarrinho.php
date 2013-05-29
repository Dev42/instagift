<?php
session_start();
include_once '../painel/conf/classLoader.php';
include_once '../config/connection.php';
include_once '../processaPagamento.php';

if (isset($_POST)) {
	
	foreach ($_POST as $k => $v) {
		$$k = $v;
	}
		
	$chart = new Chart();
	
        $idItemCarrinho = uniqid();
        
        $chart->setIdLocal($idItemCarrinho);
	$chart->setPrdId($prdId);
	
	$prdInfoController = new ProdutoInfoController();
	
	$listaInfo = $prdInfoController->getProdutoAction('produto_info_10_id',$selModelo);
	
	foreach($listaInfo as $kInfoPrd => $vInfoPrd){
		$nomeModelo = $vInfoPrd['produto_info_30_nome'];
		$valorModelo = $vInfoPrd['produto_info_20_valor'];
		$nrFotosModelo = $vInfoPrd['produto_info_10_nrFotos'];
		$pesoModelo = $vInfoPrd['produto_info_12_peso'];
	}
	
	$chart->setNome($nomeModelo);
	$chart->setValor($valorModelo);
	$chart->setNrFotos($nrFotosModelo);
	$chart->setPeso($pesoModelo);
	
	$chart->setUrlFotos($urlFotos);
	
	if(isset($urlFotosTampa)){
		$chart->setUrlFotosTampa($urlFotosTampa);
	}
	
	$chart->setQuantidade(1);
	$chart->setCor($selCor);
	
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
        
        //$chartAction = new ChartController();
        
        exit();
	if(!isset($_SESSION['InstagiftCarrinho'])){
		$_SESSION['InstagiftCarrinho'] = array();
	}
	
	$_SESSION['InstagiftCarrinho'][] = serialize($chart);
	header("Location: ../carrinho.php");
	
}else{
	header("Location: ../produtos.php");
}
?>