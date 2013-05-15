<?php
$menuCurrent = "produto-listar";
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
                                    <?php $keyphrase = '4'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php'; ?>
                                        <div class="flat_area grid_16">
                                            <?php
                                            if (isset($_GET['type']) && isset($_GET['case'])){
                                            ?>
                                                <div class="alert dismissible alert_<?php echo ( ($_GET['type'] == "success")? "green" : "red" ); ?>">
                                                    <img width="24" height="24" src="<?php echo $urlGeral; ?>/images/icons/small/white/alert_2.png">
                                                    <?php
                                                    if ($_GET['case'] == "novo"){
                                                        $compErro = "incluir";
                                                        if ($_GET['type'] == "success"){
                                                            $complSuc = "registrado";
                                                        }
                                                    }elseif ($_GET['case'] == "editar"){
                                                        $compErro = "editar";
                                                        if ($_GET['type'] == "success"){
                                                            $complSuc = "editado";
                                                        }
                                                    }elseif ($_GET['case'] == "deletar") {
                                                        $compErro = "deletar";
                                                        if ($_GET['type'] == "success"){
                                                            $complSuc = "deletado";
                                                        }
                                                        
                                                    }
                                                    if ($_GET['type'] == "success"){
                                                        $strErro = "O pedido foi $complSuc com sucesso!";
                                                    }else {
                                                        if ($_GET['erron'] == 1){
                                                            $strErro = "O erro ao processar o formulário, favor enviar novamente!";
                                                        }elseif ($_GET['erron'] == 2){
                                                            $strErro = "Acesse o formulário primeiro antes de querer alguma coisa!";
                                                        }elseif ($_GET['erron'] == 3 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro pedido, registro não encontrado!";
                                                        }elseif ($_GET['erron'] == 4 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro pedido, pedido já existente!";
                                                        }elseif ($_GET['erron'] == 5 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro produto!";
                                                        }
                                                    }
                                                    echo $strErro;
                                                    ?>
                                                </div>
                                            <?php 
                                            }
                                            ?>
                                            <h2>Listagem de Pedidos</h2>
					</div>
                                        <div class="box grid_16 single_datatable">
                                            <div id="dt1" class="no_margin">
                                                <table class="display datatable"> 
                                                    <thead> 
                                                            <tr> 
                                                                    <th>Número</th> 
                                                                    <th>Ref. PagSeguro</th> 
                                                                    <th>Cliente</th> 
                                                                    <th>E-mail</th> 
                                                                    <th>Telefone</th> 
                                                                    <th>Valor</th>
                                                                    <th>Frete</th> 
                                                                    <th>Data</th> 
                                                                    <th>Ações</th> 
                                                            </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                            <?php
                                                            
                                                            $pedidoController = new PedidosController();
                                                            
                                                            $pedList = $pedidoController->listAction();
                                                            
                                                            foreach ($pedList as $k => $v){
                                                                echo '<tr class="gradeX">';
                                                                echo '<td>'.$v["ped_10_id"].'</td>';
																echo '<td>REF00'.$v["ped_10_id"].'</td>';
                                                                echo '<td>'.$v["ped_35_nome"].'</td>';
                                                                echo '<td>'.$v["ped_35_email"].'</td>';
                                                                echo '<td>'.$v["ped_35_ddd"]."-".$v["ped_35_telefone"].'</td>';
																echo '<td>R$ '.number_format($v["ped_20_valorPedido"],2,',','.').'</td>';
																echo '<td> R$'.number_format($v["ped_20_valorFrete"],2,',','.').'</td>';
                                                                echo '<td>'.date("d/m/Y H:i", $v['ped_22_created_at']).'</td>';
                                                                echo '<td>
                                                                        <a href="'.$urlPedidos.'/detalhesPedido.php?id='.$v['ped_10_id'].'" title="Detalhes do pedido"><img src="'.$urlGeral.'/images/icons/small/grey/list_w_images.png"/></a>
                                                                     </td>';
                                                                echo '</tr>';
                                                            }
                                                            
                                                            ?>
                                                    </tbody> 
                                                </table>
                                            </div>
                                        </div>
				</div>
			</div>
		</div>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/DataTables/jquery.dataTables.js"></script>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_datatables.js"></script>
                
<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>