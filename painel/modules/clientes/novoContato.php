<?php
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';
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
                                                            <li><a href="<?php echo $urlClientes; ?>/listarContato.php">Contatos</a></li>
                                                            <li><span>Novo</span></li>
                                                    </ul>
                                            </div>
                                    </div>
					<div class="flat_area grid_16">
						<h2>Adicionar Contato</h2>
						<p>Crie um novo contato para manter o relacionamento com o cliente.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlClientes;?>/action/crudContato.php?op=novo" method="post">
                                                        <?php
                                                        
                                                        $clienteController = new ClientesController();
                                                        $cnt = new Contato();
                                                        
                                                        $cliList = $clienteController->listAction(false, true);
                                                        $cntTipo = $cnt->allContatoTipo();
                                                        
                                                        ?>
                                                        <fieldset class="label_side">
                                                                <label for="cli_id">Cliente</label>
                                                                <div>
                                                                    <select name="cli_id" id="cli_id" class="select_box full_width">
                                                                        <?php
                                                                        foreach ($cliList as $k => $v) {
                                                                            echo "<option value='".$k."'>".$v."</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="email">Tipo</label>
                                                                <div>
                                                                    <select name="contato_tipo" class="select_box">
                                                                        <?php
                                                                        foreach($cntTipo as $kCntTipo => $vCntTipo){
                                                                        ?>
                                                                            <option value="<?php echo $kCntTipo; ?>"><?php echo $vCntTipo; ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="contato_nome">Nome do contato</label>
                                                                <div>
                                                                    <input title="Nome de identificação do contato" name="contato_nome" id="contato_nome" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="contato_ddd">Telefone</label>
                                                                <div>
                                                                    <input title="DDD de identificação do contato" name="contato_ddd" id="contato_ddd" style="width: 30px ! important;" class="tooltip right" type="text" maxlength="2">
                                                                    <input title="Telefone de identificação do contato" name="contato_telefone" id="contato_telefone" style="width: 80px ! important;" class="tooltip right" maxlength="9" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="contato_email">E-mail</label>
                                                                <div>
                                                                    <input title="E-mail de identificação do contato" name="contato_email" id="contato_email" class="tooltip right" type="text">
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