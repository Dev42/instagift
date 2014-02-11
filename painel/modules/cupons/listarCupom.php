<?php
$menuCurrent = "cupom-listar";
include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/header.php';
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
                                    <?php $keyphrase = '6'; include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/navigation.php'; ?>
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
                                                        $strErro = "O cupom foi $complSuc com sucesso!";
                                                    }else {
                                                        if ($_GET['erron'] == 1){
                                                            $strErro = "O erro ao processar o formulário, favor enviar novamente!";
                                                        }elseif ($_GET['erron'] == 2){
                                                            $strErro = "Acesse o formulário primeiro antes de querer alguma coisa!";
                                                        }elseif ($_GET['erron'] == 3 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro cupom, registro não encontrado!";
                                                        }elseif ($_GET['erron'] == 4 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro cupom, cupom já existente!";
                                                        }elseif ($_GET['erron'] == 5 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro cupom!";
                                                        }
                                                    }
                                                    echo $strErro;
                                                    ?>
                                                </div>
                                            <?php 
                                            }
                                            ?>
                                            <h2>Listagem de Cupons</h2>
					</div>
                                        <div class="box grid_16 single_datatable">
                                            <div id="dt1" class="no_margin">
                                                <table class="display datatable"> 
                                                    <thead> 
                                                            <tr> 
                                                                    <th>#</th> 
                                                                    <th>Código</th> 
                                                                    <th>Valor</th> 
                                                                    <th>Validade</th> 
                                                                    <th>Usado</th>
                                                                    <th>Ações</th> 
                                                            </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                            <?php
                                                            
                                                            $cupomController = new CupomController();
                                                            
                                                            $cupomList = $cupomController->listAction(false, 2);
                                                            
                                                            foreach ($cupomList as $k => $v){
                                                                echo '<tr class="gradeX">';
                                                                echo '<td>'.$k.'</td>';
                                                                echo '<td>'.$v['cupom_35_codigo'].'</td>';
                                                                echo '<td>'.$v["cupom_10_valor"].' %</td>';
                                                                echo '<td>'.date("d/m/Y", $v['cupom_22_validade']).'</td>';
																if($v['cupom_12_status'] == 1){
																	$usado = 'Sim';
																}else{
																	$usado = 'Não';
																}
																echo '<td>'.$usado.'</td>';
																echo '<td>
                                                                        <a href="'.$urlCupons.'/deletarCupom.php?id='.$v['cupom_10_id'].'"><img src="'.$urlGeral.'/images/icons/personal/trash.gif"/></a>
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
                
<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/closing_items.php' ?>