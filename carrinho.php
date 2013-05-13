<?php
session_start();
include_once 'painel/conf/classLoader.php';
include_once 'config/connection.php';

$menuClass = array("active","","");
$title = "Meu Carrinho";
$produtoController = new ProdutoFrontController();

include("inc/header_site.php");
?>
	<div class="row login carrinho">
    	<div class="span12">
        	<h1>Preencha a quantidade, os dados do comprador e do endereço de entrega do produto</h1>
        </div>
        <div class="span12">
        
        	<table class="table table-striped table-bordered" style="width:900px; margin-left:30px;">
            	<?php
                foreach($_SESSION['InstagiftCarrinho'] as $k => $v){
                        $objFixed = unserialize($v);

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
                                <td style='width:110px; padding:0;'><img src='images/uploads/produtos/produto/".$foto."' width='110' height='83'/></td>
                                <td style='width:450px;'>
								<div class='infosProd'>
								<span class='nomeProd'>".$nomeProd."</span><br><span class='nomeModelo'>".$nomeModelo.
								"</span>
								</div>
								<div class='remProd'>
									<a href='excluirProdutoCarrinho.php?id=".$objFixed->getIdLocal()."' style='border:none;'><img src='images/site/btn-remover.png' alt='Remover' /></a>
								</div>
								</td>
                                <td style='text-align:center; padding-top:28px; width:180px;'>
                                    <div class='input-append'>
                                        <input readonly='readonly' style='width:50px' id='quantidade_".$objFixed->getIdLocal()."' type='text' value='".$quantidade."' class='inputQtde' />
                                        <input class='btn' type='button' value='+' onclick=alteraQtde('" .$objFixed->getIdLocal()."','add') />
                                        <input class='btn' type='button' value = '-' onclick=alteraQtde('" .$objFixed->getIdLocal()."','rm') />
                                    </div>
                                </td>
                                <td style='text-align:center;'><div class='valorProd'><span id='valor_".$objFixed->getIdLocal()."'>R$ ".$valor."</span></div></td>
                                </tr>";
                }
		?>
        		<tr style="height:83px;">
                	<td colspan="2" style="text-align:right; padding-right:15px; padding-top:30px;"><span class="descCep">Calcule o valor da entrega preenchendo seu CEP</span></td>
                    <td style="padding-top:20px;"><input id="cepCliente" name="cepCliente" type="text" class="inputCep" /><img src="images/site/btn-calculo-cep.png" alt="Calcular" onclick="calcularCep();" class="btnCalculaCep" /></td>
                    <td style="text-align:center;"><div class="valorProd"><span id="valor_cep">-</span></div></td>
                </tr>
            </table>
        </div>
    </div>
<?php
include("inc/footer_site.php");
?>