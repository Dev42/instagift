<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $contatoController = new ContatoController();
    $contato = $contatoController->listAction($_GET['id']);
    
    $clienteController = new ClientesController();
    //$cliente = $clienteController->listAction($_GET['id']);
    
    if (count($contato) == 0){
        
        header("Location: $urlCliente/listar.php?type=error&case=editar&erron=3");
        
    }
}   
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '3'; include $_SERVER['DOCUMENT_ROOT'] . '/painel/includes/navigation.php';?>
                                    <div class="grid_16">
                                            <div class="indented round_all clearfix send_left">
                                                    <ul class="breadcrumb clearfix">
                                                            <li><a href="<?php echo $urlGeral; ?>/index.php"><div class="ui-icon ui-icon-home"></div></a></li>
                                                            <li><a href="<?php echo $urlClientes; ?>/listar.php">Clientes</a></li>
                                                            <li><a href="<?php echo $urlClientes; ?>/listarContato.php">Contatos</a></li>
                                                            <li><span>Deletar - <?php echo $contato[1]->getNome(); ?></span></li>
                                                    </ul>
                                            </div>
                                    </div>
					<div class="flat_area grid_16">
						<h2>Deletar Contato</h2>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <h2 class="section">
                                                        Tem certeza que deseja deletar o contato <b><?php echo $contato[1]->getNome(); ?></b>
                                                    </h2>
                                                    <form action="<?php echo $urlClientes;?>/action/crudContato.php?op=deletar" method="post">
                                                        <div style="display: none;">
                                                            <input type="hidden" name="cnt_10_id" value="<?php echo $contato[1]->getId(); ?>" />
                                                        </div>
                                                        <div class="button_bar clearfix">
                                                            <button class="green" type="submit">
                                                                <img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $urlGeral; ?>/images/icons/small/white/bended_arrow_right.png">
                                                                <span>Yes</span>
                                                            </button>
                                                            <button class="red" onclick="history.go(-1);">
                                                                <img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $urlGeral; ?>/images/icons/small/white/bended_arrow_right.png">
                                                                <span>No</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
					</div>
				</div>
			</div>
		</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/painel/includes/closing_items.php'; ?>