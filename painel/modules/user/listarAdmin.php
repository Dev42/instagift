<?php
$menuCurrent = "user-listar";
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
                                    <?php $keyphrase = '5'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php'; ?>
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
                                                        $strErro = "O usuário foi $complSuc com sucesso!";
                                                    }else {
                                                        if ($_GET['erron'] == 1){
                                                            $strErro = "O erro ao processar o formulário, favor enviar novamente!";
                                                        }elseif ($_GET['erron'] == 2){
                                                            $strErro = "Acesse o formulário primeiro antes de querer alguma coisa!";
                                                        }elseif ($_GET['erron'] == 3 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro administrador, registro não encontrado!";
                                                        }elseif ($_GET['erron'] == 4 && isset($compErro)){
                                                            $strErro = "Erro ao $compErro administrador, login já existente!";
                                                        }
                                                    }
                                                    echo $strErro;
                                                    ?>
                                                </div>
                                            <?php 
                                            }
                                            ?>
                                            <h2>Listagem de Administradores</h2>
					</div>
                                        <div class="box grid_16 single_datatable">
                                            <div id="dt1" class="no_margin">
                                                <table class="display datatable"> 
                                                    <thead> 
                                                            <tr> 
                                                                    <th>#</th> 
                                                                    <th>Login</th> 
                                                                    <th>E-mail</th> 
                                                                    <th>Ações</th> 
                                                            </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                            <?php
                                                            
                                                            $userController = new AdminController();
                                                            
                                                            $userList = $userController->listAction(false, 1);
                                                            
                                                            foreach ($userList as $k => $v){
                                                                echo '<tr class="gradeX">';
                                                                echo '<td>'.$k.'</td>';
                                                                echo '<td>'.$v['user_30_username'].'</td>';
                                                                echo '<td>'.$v['user_30_email'].'</td>';
                                                                echo '<td>
                                                                        <a href="'.$urlUser.'/editarAdmin.php?id='.$v['user_10_id'].'"><img src="'.$urlGeral.'/images/icons/personal/edit.png"/></a>';
																if($v['user_10_id'] != 1){		
                                                                echo   '<a href="'.$urlUser.'/deletarAdmin.php?id='.$v['user_10_id'].'"><img src="'.$urlGeral.'/images/icons/personal/trash.gif"/></a>';
																}
                                                                echo '</td>';
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