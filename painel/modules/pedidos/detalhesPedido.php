<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
	$pedidoController = new PedidosController();
	$produtoController = new ProdutoFrontController();
	
	$pedido = $pedidoController->listAction($_GET['id'] , 1);
		
	$chtController = new ChartController();
	$chtList = $chtController->listByPedido($pedido[1]["ped_10_id"]);
	
	$nomeCliente = $pedido[1]["ped_35_nome"];
	$emailCliente = $pedido[1]["ped_35_email"];
	$telefone = $pedido[1]["ped_35_ddd"]."-".$pedido[1]["ped_35_telefone"];
	$enderecoL1 = $pedido[1]["ped_35_logradouro"].", ".$pedido[1]["ped_35_numero"]." ".$pedido[1]["ped_35_complemento"];
	$enderecoL2 = $pedido[1]["ped_35_cep"]." - ".$pedido[1]["ped_35_bairro"];
	$enderecoL3 = $pedido[1]["ped_35_cidade"]." - ".$pedido[1]["ped_35_estado"];
	$valorPedido = "R$ ".number_format($pedido[1]["ped_20_valorPedido"],2,',','.');
	$valorFrete = "R$ ".number_format($pedido[1]["ped_20_valorFrete"],2,',','.');
	$codTipoFrete = $pedido[1]["ped_12_frete"];
	if($codTipoFrete == 1){
		$tipoFrete = "Sedex";
	}else{
		$tipoFrete = "PAC";
	}
	$peso = number_format($pedido[1]["ped_20_peso"],3,',','.');
	$criadoEm = date("d/m/Y - H:i", $pedido[1]["ped_22_created_at"]);
}

?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '4'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
					<div class="flat_area grid_16">
						<h2>Detalhes do pedido - <?php echo $pedido[1]["ped_10_id"]; ?></h2>
					</div>
                    <div class="box grid_16 single_datatable">
                        <div id="dt1" class="no_margin">
                            <table class="display datatable"> 
                                <thead> 
                                        <tr> 
                                            <th>Produto</th> 
                                            <th>Modelo</th> 
                                            <th>Cor</th>
                                            <th>Valor Unid.</th> 
                                            <th>Qtde.</th> 
                                            <th>Download Fotos</th> 
                                        </tr> 
                                </thead> 
                                <tbody> 
                                        <?php
                                        
                                        foreach ($chtList as $kChart => $vChart){
											$prdList = $produtoController->listAction($vChart['produto_10_id'], false);
											foreach ($prdList as $kProd => $vProd){
												$nomeProd = $vProd->getNome();
												$tipoProd = $vProd->getTipo();
											}
											$idChart = $vChart['cht_10_id']; 
											$modelo = $vChart['cht_30_nome']; 
											$quantidade = $vChart['cht_10_quantidade'];
											$valorUnid = $vChart['cht_20_valor']/$vChart['cht_10_quantidade'];
											$urlFotosTampa = $vChart['cht_35_urlFotosTampa'];
											$cor = $vChart['cht_30_cor'];
										
                                            echo '<tr class="gradeX">';
                                            echo '<td>'.$nomeProd.'</td>';
                                            echo '<td>'.$modelo.'</td>';
                                            echo '<td>'.$cor.'</td>';
                                            echo '<td>R$ '.number_format($valorUnid,2,',','.').'</td>';
                                            echo '<td>'.$quantidade.'</td>';
                                            echo '<td>';
											
											if($urlFotosTampa != ''){
												echo '<a href="'.$urlPedidos.'/downloadFotos.php?id='.$idChart.'&mod=t" title="Fotos Tampa">Fotos Tampa</a><br />';
											}
											
                                            echo 	'<a href="'.$urlPedidos.'/downloadFotos.php?id='.$idChart.'&mod=n" title="Fotos Produto">Fotos Produto</a>
                                                 </td>';
                                            echo '</tr>';
                                        }
                                        
                                        ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
					<div class="box grid_16">
                        <div class="block">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <fieldset class="label_side">
                                        <label>Nome Cliente</label>
                                        <div>
                                            <p><?php echo $nomeCliente; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>E-mail</label>
                                        <div>
                                            <p><?php echo $emailCliente; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Telefone</label>
                                        <div>
                                            <p><?php echo $telefone; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Endereço de Entrega</label>
                                        <div>
                                            <p><?php echo $enderecoL1; ?></p>
                                            <p><?php echo $enderecoL2; ?></p>
                                            <p><?php echo $enderecoL3; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Valor do pedido</label>
                                        <div>
                                            <p><?php echo $valorPedido; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Tipo do frete</label>
                                        <div>
                                            <p><?php echo $tipoFrete; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Valor do frete</label>
                                        <div>
                                            <p><?php echo $valorFrete; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Peso Total</label>
                                        <div>
                                            <p><?php echo $peso; ?></p>
                                        </div>
                                </fieldset>
                                <fieldset class="label_side">
                                        <label>Feito em</label>
                                        <div>
                                            <p><?php echo $criadoEm; ?></p>
                                        </div>
                                </fieldset>
                                
                                <div class="button_bar clearfix">
                                    <button class="green" onclick="history.go(-1);">
                                        <img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $urlGeral; ?>/images/icons/small/white/bended_arrow_right.png">
                                        <span>Voltar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
					</div>
				</div>
			</div>
		</div>

                
<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/isotope/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/fancybox/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_gallery.js"></script>
<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/DataTables/jquery.dataTables.js"></script>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_datatables.js"></script>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/geralScript.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>