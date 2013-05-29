<?php
if(isset($_POST['cepCliente'])){
	session_start();
	include_once 'painel/conf/classLoader.php';
	include_once 'config/connection.php';
	
	$menuClass = array("active","","");
	$title = "Resumo do Pedido";
	$produtoController = new ProdutoFrontController();
	
	$valor = 0;
	$peso = 0;
	
        if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
            $username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
            $origem = '1';
        }else {
            $username = ($_SESSION['InstagiftDadosUserFb']['username']);
            $origem = '2';
        }
        $status = '1';
        $chartAction = new ChartController();
        $chartProducts = $chartAction->listActionChart($username, $origem, $status);
	foreach ($chartProducts as $kChart => $vChart) {
            $chart = new Chart();
            $obj = $chart->fetchEntity($vChart);
            $peso = $peso + $obj->getPeso();
            $valor = $valor + $obj->getValor();
	}
	
	$pesoCru = $peso;
	$peso = number_format($peso,3,',','.');
	$valorCru = $valor;
	$valor = number_format($valor,2,',','.');
	
	$retorno = calculaFrete($_POST['cepCliente'], $peso, $valor);
	
	$retArr = explode("|", $retorno);
	
	$tipoEntrega = $_POST['optFrete'];
	if($tipoEntrega == 'pac'){
		$valorEntregaCru = $retArr[4];
		$valorEntrega = number_format($retArr[4],2,',','.');
	}else{
		$valorEntregaCru = $retArr[3];
		$valorEntrega = number_format($retArr[3],2,',','.');
	}
	
	if($retArr[0] != 'ok'){
		echo "<script>alert('Ocorreu um erro com o CEP, por favor preencha novamente');
				window.location = 'carrinho.php';</script>";
	}
	
	$valorTotalCru = $valorEntregaCru + $valorCru;
	$valorTotal = number_format($valorTotalCru,2,',','.');
	
	$_SESSION['InstagiftCepEntrega'] = $_POST['cepCliente'];
	$_SESSION['InstagiftTipoEntrega'] = $tipoEntrega;
	$_SESSION['InstagiftValorEntrega'] = $valorEntregaCru;
	$_SESSION['InstagiftTotalPedido'] = $valorCru;
	$_SESSION['InstagiftPesoTotal'] = $pesoCru;
	
	include("inc/header_site.php");
?>
	<div class="row login carrinho">
    	<div class="span12 titPagina">
        	<span class="titulo">RESUMO DO PEDIDO</span><span class="subtitulo" style="margin-left:375px;">Quantidade</span><span class="subtitulo" style="margin-left:95px;">Valor</span>
        </div>
        <div class="span12">
                <table class="table table-striped table-bordered" style="width:900px; margin-left:30px;">
                    <?php
                    if ($_SESSION['InstagiftTipoLogin'] == 'Insta'){
                        $username = ($_SESSION['InstagiftDadosInsta']['data']['username']);
                        $origem = '1';
                    }else {
                        $username = ($_SESSION['InstagiftDadosUserFb']['username']);
                        $origem = '2';
                    }
                    $status = '1';
                    $chartAction = new ChartController();
                    $chartProducts = $chartAction->listActionChart($username, $origem, $status);
                    foreach($chartProducts as $k => $v){
                            $chart = new Chart();
                            $objFixed = $chart->fetchEntity($vChart);
    
                            $prdList = $produtoController->listAction($objFixed->getPrdId(), false);
                            foreach ($prdList as $kProd => $vProd){
                                    $foto = $vProd->getFoto(true);
    
                                    $nomeProd = $vProd->getNome();
                            }
                            $nomeModelo = $objFixed->getNome();
                            $quantidade = $objFixed->getQuantidade();
                            $valor = $objFixed->getValor();
                            $valor = str_replace('.', ',', $valor);
    
                            echo "<tr style='height:83px;'>
                                    <td style='width:110px; padding:0;'><img src='images/uploads/produtos/produto/".$foto."' width='110' height='83' class='imgCarrinho'/></td>
                                    <td style='width:400px;'>
                                    <div class='infosProd'>
                                    <span class='nomeProd'>".$nomeProd."</span><br><span class='nomeModelo'>".$nomeModelo."</span>
                                    </div>
                                    </td>
                                    <td style='text-align:center;'><div class='valorProd'><span>".$quantidade."</span></div></td>
                                    <td style='text-align:center;'><div class='valorProd'><span>R$ ".$valor."</span></div></td>
                                    </tr>";
                    }
            ?>
                    <tr style="height:83px;">
                        <td colspan="2" style="text-align:right; padding-right:15px; padding-top:30px;"><span class="descCep">CEP destinatário</span></td>
                        <td style="text-align:center;"><div class="valorProd"><span><?php echo $_SESSION['InstagiftCepEntrega']; ?></span></div></td>
                        <td style="text-align:center;"><div class="valorProd"><span>R$ <?php echo $valorEntrega; ?></span></div></td>
                    </tr>
                    <tr style="height:83px;">
                        <td colspan="3" style="text-align:right; padding-right:15px; padding-top:30px;"><span class="descCep">TOTAL DO PEDIDO:</span></td>
                        <td style="text-align:center;"><div class="valorProd"><span>R$ <?php echo $valorTotal; ?></span></div></td>
                    </tr>
                </table>
            <div class="botoesNav span12">
            	<a href="carrinho.php" class="btnEsq" alt="Editar pedido">Editar pedido</a>
                <a href="fechaPedido.php" class="btnDir" alt="Finalizar pedido">Finalizar pedido</a>
            </div>
            </form>
        </div>
    </div>
<?php
include("inc/footer_site.php");
}else{
	header("Location: index.php");
}
?>