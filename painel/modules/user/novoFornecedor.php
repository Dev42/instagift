<?php
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '2'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
					<div class="flat_area grid_16">
						<h2>Adicionar Fornecedor</h2>
						<p>Crie um fornecedor para que ele possa acessar o sistema.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlUser;?>/action/crudFornecedor.php?op=novo" method="post">
                                                        <fieldset class="label_side">
                                                                <label for="nome_empresa">Nome da empresa</label>
                                                                <div>
                                                                    <input title="Nome de identificação da empresa." name="nome_empresa" id="nome_empresa" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="contato">Responsável/ Contato</label>
                                                                <div>
                                                                    <input title="Nome de identificação do responsavel." name="contato" id="contato" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="telefone_ddd">Telefone</label>
                                                                <div>
                                                                    <input title="DDD do telefone" name="telefone_ddd" id="telefone_ddd" style="width: 30px !important;" class="tooltip right" type="text" maxlength="2">
                                                                    <input title="Telefone para contato com a empresa." name="telefone" id="telefone" style="width: 80px !important;" class="tooltip right" type="text" maxlength="10">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="email">E-mail</label>
                                                                <div>
                                                                    <input title="E-mail para contato." name="email" id="email" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="endereco">Endereço</label>
                                                                <div>
                                                                    <input title="Endereço da empresa." name="endereco" id="endereco" class="tooltip right" type="text">
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="observacao">Observações</label>
                                                                <div>
                                                                    <textarea title="Observações sobre o fornecedor!." name="observacao" id="observacao" class="tooltip right" type="text"></textarea>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="login">Login</label>
                                                                <div>
                                                                    <input title="Login para identificação do usuário." name="login" id="login" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="senha">Senha</label>
                                                                <div>
                                                                    <input title="Senha de identificação do usuário" name="senha" id="senha" class="tooltip right" type="password">
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