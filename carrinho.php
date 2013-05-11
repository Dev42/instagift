<?php
session_start();
include_once 'painel/conf/classLoader.php';
include_once 'config/connection.php';

$menuClass = array("active","","");
$title = "Meu Carrinho";
$produtoController = new ProdutoFrontController();

include("inc/header_site.php");
?>
	<div class="row login">
    	<div class="span12">
        	<h1>Preencha a quantidade, os dados do comprador e do endereço de entrega do produto</h1>
        </div>
        <div class="span12">
        
        	<table class="table table-striped table-bordered" style="width:800px">
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

                        echo "<tr>
                                <td><a href='excluirProdutoCarrinho.php?id=".$objFixed->getIdLocal()."'>excluir produto</a></td>
                                <td><img src='images/uploads/produtos/produto/".$foto."' width='80'/></td>
                                <td>".$nomeProd."<br>".$nomeModelo."</td>
                                <td>
                                    <div class='input-append'>
                                        <input style='width:50px' id='quantidade_".$objFixed->getIdLocal()."' type='text' value='".$quantidade."'>
                                        <input class='btn' type='button' value='+' onclick=aumentaQtde('" .$objFixed->getIdLocal()."') />
                                        <input class='btn' type='button' value = '-' onclick=diminuiQtde('" .$objFixed->getIdLocal()."') />
                                    </div>
                                </td>
                                <td id='quantidade_".$objFixed->getIdLocal()."'>R$ ".$valor."</td>
                                </tr>";
                }
		?>
            </table>
        </div>
    </div>
<?php
include("inc/footer_site.php");
?>