<?php
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

$userController = new UserController();
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '4'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
                                    <div class="grid_16">
                                            <div class="indented round_all clearfix send_left">
                                                    <ul class="breadcrumb clearfix">
                                                            <li><a href="<?php echo $urlGeral; ?>/index.php"><div class="ui-icon ui-icon-home"></div></a></li>
                                                            <li><a href="<?php echo $urlProdutos; ?>/listarProduto.php">Admin</a></li>
                                                            <li><span>Novo</span></li>
                                                    </ul>
                                            </div>
                                    </div>
					<div class="flat_area grid_16">
						<h2>Adicionar Produto</h2>
						<p>Crie um novo produto para o site.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlProdutos;?>/action/crudProduto.php?op=novo" method="post" enctype="multipart/form-data">
                                                        <fieldset class="label_side">
                                                                <label for="nome">Nome</label>
                                                                <div>
                                                                    <input title="Nome de identificação do produto." name="nome" id="nome" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="nome">Fornecedor</label>
                                                                <div class="listForn">
                                                                    <table id="tbody_tr_contato">
                                                                        <tr id="1">
                                                                            <td>
                                                                                <select class="select_box full_width" name="prd_forn[]" required="required">
                                                                                <?php
                                                                                    $listForn = $userController->listAction();
                                                                                    foreach($listForn as $k => $v){
                                                                                        $usr = new User();
                                                                                        $usr->fetchEntity($v);
                                                                                        echo "<option value='".$usr->getId()."'>".$usr->getNome()."</option>";
                                                                                    }
                                                                                ?>
                                                                                </select> 
                                                                            </td>
                                                                            <td>
                                                                                <img id="tr_contato" class="lineClone" style="cursor: pointer; padding-bottom: 5px;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Fornecedor"/>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_contato_inv" style="display: none;">
                                                                            <td>
                                                                                <select class="select_box full_width" name="prd_forn[]">
                                                                                <?php
                                                                                    $listForn = $userController->listAction();
                                                                                    foreach($listForn as $k => $v){
                                                                                        $usr = new User();
                                                                                        $usr->fetchEntity($v);
                                                                                        echo "<option value='".$usr->getId()."'>".$usr->getNome()."</option>";
                                                                                    }
                                                                                ?>
                                                                                </select> 
                                                                            </td>
                                                                            <td>
                                                                                <img style="padding-bottom: 5px;" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Fornecedor"/>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="nome">Imagens</label>
                                                                <div class="listImages">
                                                                    <table id="tbody_tr_image">
                                                                        <tr id="2" style="height: 30px;">
                                                                            <td>
                                                                                <input type="file" class="uniform" name="prd_image[]">
                                                                            </td>
                                                                            <td>
                                                                                <img id="tr_image" class="lineClone" style="cursor: pointer;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Imagem"/>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_image_inv" style="display: none; height: 30px;">
                                                                            <td>
                                                                                <input type="file" class="uniform" name="prd_image[]">
                                                                            </td>
                                                                            <td>
                                                                                <img style="cursor: pointer;" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Image"/>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="descCurta">Descrição Curta</label>
                                                                <div>
                                                                    <input title="Descrição do produto na página de produtos." name="descCurta" id="descCurta" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="descCompleta">Descrição Completa</label>
                                                                <div>
                                                                    <textarea title="Descrição do produto na sua página." name="descCompleta" id="descCompleta" class="tooltip right" type="text"></textarea>
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="valor">Valor</label>
                                                                <div>
                                                                    <input title="Valor do produto em reais." name="valor" id="valor" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="peso">Peso</label>
                                                                <div>
                                                                    <input title="Peso do pacote que será enviado ao cliente em kg." name="peso" id="peso" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="prazoProducao">Prazo de Produção</label>
                                                                <div>
                                                                    <input title="Prazo de produção do produto em dias." name="prazoProducao" id="prazoProducao" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="larguraMinima">Largura Mínima</label>
                                                                <div>
                                                                    <input title="Largura mínima de foto para o produto em px." name="larguraMinima" id="larguraMinima" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="alturaMinima">Altura Mínima</label>
                                                                <div>
                                                                    <input title="Altura mínima de foto para o produto em px." name="alturaMinima" id="alturaMinima" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="minimoFotos">Mínimo de Fotos</label>
                                                                <div>
                                                                    <input title="Número mínimo de fotos para o produto." name="minimoFotos" id="minimoFotos" class="tooltip right" type="text">
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

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/geralScript.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>