<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $enderecoController = new EnderecoController();
    $endereco = $enderecoController->listAction($_GET['id']);
    
    //$cliente = $clienteController->listAction($_GET['id']);
    
    if (count($endereco) == 0){
        
        header("Location: $urlCliente/listarEndereco.php?type=error&case=editar&erron=3");
        
    }
    
}

?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '3'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
                                        <div class="grid_16">
                                                <div class="indented round_all clearfix send_left">
                                                        <ul class="breadcrumb clearfix">
                                                                <li><a href="<?php echo $urlGeral; ?>/index.php"><div class="ui-icon ui-icon-home"></div></a></li>
                                                                <li><a href="<?php echo $urlClientes; ?>/listar.php">Clientes</a></li>
                                                                <li><a href="<?php echo $urlClientes; ?>/listarEndereco.php">Endereços</a></li>
                                                                <li><span>Editar - <?php echo $endereco[1]->getEndereco(); ?></span></li>
                                                        </ul>
                                                </div>
                                        </div>
					<div class="flat_area grid_16">
						<h2>Adicionar Endereço</h2>
						<p>Crie um novo endereço para um cliente.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlClientes;?>/action/crudEndereco.php?op=editar" method="post">
                                                        <?php
                                                        
                                                        $clienteController = new ClientesController();
                                                        $cnt = new Contato();
                                                        
                                                        $cliList = $clienteController->listAction(false, true);
                                                        $cntTipo = $cnt->allContatoTipo();
                                                        
                                                        ?>
                                                        <div style="display: none;">
                                                            <input type="hidden" value="<?php echo $_GET['id'] ; ?>" name="id" />
                                                        </div>
                                                        <fieldset class="label_side">
                                                                <label for="cli_id">Cliente</label>
                                                                <div>
                                                                    <select name="cli_id" id="cli_id" class="select_box full_width">
                                                                        <?php
                                                                        foreach ($cliList as $k => $v) {
                                                                            echo "<option value='".$k."' ".($endereco[1]->getClienteId() == $k? "selected='selected'" : "").">".$v."</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="endereco_endereco">Endereço</label>
                                                                <div>
                                                                    <input title="Logradouro do endereço" name="endereco_endereco" id="endereco_endereco" style="width: 180px ! important;" value="<?php echo $endereco[1]->getEndereco();?>" class="tooltip right" type="text">
                                                                    <span style="margin-left: 15px; margin-right: 5px; font-weight: 700;">Nº</span>
                                                                    <input title="Número de identificação do endereço" name="endereco_numero" id="endereco_numero" style="width: 40px ! important;" value="<?php echo $endereco[1]->getNumero();?>" class="tooltip right" type="text">
                                                                    <span style="margin-left: 15px; margin-right: 5px; font-weight: 700;">Complemento</span>
                                                                    <input title="Complemento de identificação do endereço" name="endereco_complemento" id="endereco_complemento" style="width: 90px ! important;" value="<?php echo $endereco[1]->getComplemento();?>" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="endereco_cidade">Cidade</label>
                                                                <div>
                                                                    <input title="Cidade de identificação do endereço" name="endereco_cidade" id="endereco_cidade" value="<?php echo $endereco[1]->getCidade();?>" style="width: 100px ! important;" class="tooltip right" type="text">
                                                                    <span style="margin-left: 15px; margin-right: 5px; font-weight: 700;">Estado</span>
                                                                    <input title="Estado de identificação do endereço" name="endereco_estado" id="endereco_estado" value="<?php echo $endereco[1]->getEstado();?>" maxlength="2" style="width: 30px ! important;" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="endereco_cep">CEP</label>
                                                                <div>
                                                                    <input title="CEP de idenficação do endereço" name="endereco_cep" value="<?php echo $endereco[1]->getCep();?>" id="endereco_cep" style="width: 100px ! important;" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>