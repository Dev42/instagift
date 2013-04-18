<?php
$menuCurrent = "user-listar";
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
                                    <?php $keyphrase = '3'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php'; ?>
                                        <div class="flat_area grid_16">
                                            <?php
                                            if (isset($_GET['type']) && isset($_GET['case'])){
                                            ?>
                                                <div class="alert dismissible alert_<?php echo ( ($_GET['type'] == "success")? "green" : "red" ); ?>">
                                                    <img width="24" height="24" src="<?php echo $urlGeral; ?>/images/icons/small/white/alert_2.png">
                                                    <?php
                                                    if ($_GET['case'] == "novo"){
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
                                                        echo "O cliente foi $complSuc com sucesso!";
                                                    }else {
                                                        if ($_GET['erron'] == 1){
                                                            $strErro = "O erro ao processar o formulário, favor enviar novamente!";
                                                        }elseif ($_GET['erron'] == 2){
                                                            $strErro = "Acesse o formulário primeiro antes de querer alguma coisa!";
                                                        }elseif ($_GET['erron'] == 3 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro cliente, registro não encontrado!";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            <?php 
                                            }
                                            ?>
                                            <h2>Listagem de Clientes</h2>
					</div>
                                        <div class="box grid_16 single_datatable">
                                            <div id="dt1" class="no_margin">
                                                <table class="display datatable"> 
                                                    <thead> 
                                                            <tr> 
                                                                    <th>#</th> 
                                                                    <th>Nome</th> 
                                                                    <th>Logo</th> 
                                                                    <th>Site</th> 
                                                                    <th>Contatos</th> 
                                                                    <th>Endereços</th> 
                                                                    <th>Ações</th> 
                                                            </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                            <?php
                                                            
                                                            $clienteController = new ClientesController();
                                                            
                                                            if (isset($_GET['cliId']) && $_GET['cliId'] > 0){
                                                                $clienteList = $clienteController->listAction($_GET['cliId']);
                                                            }else {
                                                                $clienteList = $clienteController->listAction();
                                                            }
                                                            
                                                            foreach ($clienteList as $k => $v){
                                                                
                                                                $numContato = $clienteController->countChilds($v);
                                                                $numEndereco = $clienteController->countChilds($v, "endereco");
                                                                
                                                                echo '<tr class="gradeX">';
                                                                echo '<td>'.$k.'</td>';
                                                                echo '<td>'.$v->getNome().'</td>';
                                                                echo '<td><img src="'.$v->getWebPath().'" /></td>';
                                                                echo '<td><a href="'.$v->getSite().'" target="_blank">'.$v->getNome().'</a></td>';
                                                                echo '<td><a href="'.$urlClientes.'/listarContato.php?cliId='.$v->getId().'" target="_blank">'.$numContato["total"].'</a></td>';
                                                                echo '<td><a href="'.$urlClientes.'/listarEndereco.php?cliId='.$v->getId().'" target="_blank">'.$numEndereco["total"].'</a></td>';
                                                                echo '<td>
                                                                        <a href="'.$urlClientes.'/editar.php?id='.$v->getId().'"><img src="'.$urlGeral.'/images/icons/personal/edit.png"/></a>
                                                                        <a href="'.$urlClientes.'/deletar.php?id='.$v->getId().'"><img src="'.$urlGeral.'/images/icons/personal/trash.gif"/></a>
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