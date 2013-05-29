<?php
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

$userController = new UserController();
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '3'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
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
                                                        <fieldset class="label_side" style="height: 50px;">
                                                                <label for="nome">Foto Principal</label>
                                                                <div class="foto">
                                                                    <input type="file" class="uniform" name="prd_foto">
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side" style="height: 50px;">
                                                                <label for="nome">Banner</label>
                                                                <div class="banner">
                                                                    <input type="file" class="uniform" name="prd_banner">
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
                                                        <fieldset class="label_side"style="height: auto;">
                                                                <label for="nome">Cores</label>
                                                                <div class="listImages">
                                                                    <table id="tbody_tr_color">
                                                                        <tr id="2" style="height: 25px;">
                                                                            <td>
                                                                                <input type="hidden" class="cp-full" value="186aa7" name="prd_color[]"/><input title="Nome da Cor" type="text" name="prd_color_name[]" style="padding: 10px 0px 5px 6px; border-radius: 4px; border: #ccc solid 1px; float:left; width:150px !important;" class="text"/>
                                                                            </td>
                                                                            <td>
                                                                                <div style="padding-top: 5px;">
                                                                                    <img id="tr_color" class="lineClone" style="cursor: pointer;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Imagem"/>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_color_inv" style="display: none; height: 25px;">
                                                                            <td>
                                                                                <input type="hidden" class="cp-full" value="186aa7" name="prd_color[]"/><input title="Nome da Cor" type="text" name="prd_color_name[]" style="padding: 10px 0px 5px 6px; border-radius: 4px; border: #ccc solid 1px; float:left; width:150px !important;" class="text"/>
                                                                            </td>
                                                                            <td>
                                                                                <img style="cursor: pointer;" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Image"/>
                                                                            </td>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <div style="clear: both;"></div>
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
                                                                <label for="opcoesCompra">
                                                                    Opções de Compra
                                                                    <br />
                                                                    <small style="font-size: 10px;font-weight: normal; color: red;">(todos os campos na opção de compra são obrigatórios)</small>
                                                                    <br /><br />
                                                                    <img id="tr_opcaoCompra" class="lineClone" style="cursor: pointer;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Imagem"/>
                                                                </label>
                                                                <div class="listImages">
                                                                <table id="tbody_tr_opcaoCompra">
                                                                        <tr id="2">
                                                                        	<td>
                                                                                <div>
                                                                                    <label for="produto_info_nome">Nome da Opção</label>
                                                                                    <input title="Nome da opção de compra." name="produto_info_nome[]" id="produto_info_nome" class="text" type="text">
                                                                                </div>
                                                                                <br />
                                                                                <div>
                                                                                    <label for="produto_info_desc">Descrição da Opção</label>
                                                                                    <input title="Descrição da opção de compra." name="produto_info_desc[]" id="produto_info_desc" class="text" type="text">
                                                                                </div>
                                                                                <br />
                                                                                <div style="float: left; width: 100px !important;">
                                                                                    <label for="produto_info_valor">Valor da Opção</label>
                                                                                    <input title="Valor da Opção (em reais)" style="width: 100px !important;" name="produto_info_valor[]" id="produto_info_valor" class="text" type="text">
                                                                                </div>
                                                                                <div style="float: left; width: 100px !important; margin-left: 10px;">
                                                                                    <label for="produto_info_nrFotos">Qtde Fotos</label>
                                                                                    <input title="Número de Fotos para o produto" style="width: 100px !important;" name="produto_info_nrFotos[]" id="produto_info_nrFotos" class="text" type="text">
                                                                                </div>
                                                                            	<div style="float: left; width: 100px !important; margin-left: 10px; margin-bottom:20px;">
                                                                                    <label for="produto_info_peso">Peso da Opção</label>
                                                                                    <input title="Peso da Opção (em quilos)" style="width: 100px !important;" name="produto_info_peso[]" id="produto_info_peso" class="text" type="text">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_opcaoCompra_inv" style="display: none;">
                                                                        	<td>
                                                                                <div>
                                                                                    <label for="produto_info_nome">Nome da Opção</label>
                                                                                    <input title="Nome da opção de compra." name="produto_info_nome[]" id="produto_info_nome" class="text" type="text">
                                                                                </div>
                                                                                <br />
                                                                                <div>
                                                                                    <label for="produto_info_desc">Descrição da Opção</label>
                                                                                    <input title="Descrição da opção de compra." name="produto_info_desc[]" id="produto_info_desc" class="text" type="text">
                                                                                </div>
                                                                                <br />
                                                                                <div style="float: left; width: 100px !important;">
                                                                                    <label for="produto_info_valor">Valor da Opção</label>
                                                                                    <input title="Valor da Opção (em reais)" style="width: 100px !important;" name="produto_info_valor[]" id="produto_info_valor" class="text" type="text">
                                                                                </div>
                                                                                 <div style="float: left; width: 100px !important; margin-left: 10px;">
                                                                                    <label for="produto_info_nrFotos">Qtde Fotos</label>
                                                                                    <input title="Número de Fotos para o produto" style="width: 100px !important;" name="produto_info_nrFotos[]" id="produto_info_nrFotos" class="text" type="text">
                                                                                </div>
                                                                            	<div style="float: left; width: 100px !important; margin-left: 10px; margin-bottom:20px;">
                                                                                    <label for="produto_info_peso">Peso da Opção</label>
                                                                                    <input title="Peso da Opção (em quilos)" style="width: 100px !important;" name="produto_info_peso[]" id="produto_info_peso" class="text" type="text">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                            	</table>
                                                                <div style="clear: both;"></div>
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
                                                        <fieldset class="label_side">
                                                                <label>Modelo de tela de compra</label>
                                                                <div class="uniform inline clearfix">
                                                                    <label for="yes3b">
                                                                        <div class="radio" id="uniform-yes3b">
                                                                            <span class="">
                                                                                <input class="radTipo" type="radio" id="yes3b" value="0" checked="checked" name="prd_tipo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Compra normal
                                                                    </label>
                                                                    <label for="no3b">
                                                                        <div class="radio" id="uniform-no3b">
                                                                            <span class="checked">
                                                                                <input class="radTipo" type="radio" id="no3b" value="1" name="prd_tipo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Compra de caixa
                                                                    </label>
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
<script>
$(document).ready(function(){
    $(".cp-full").livequery(function(){ 
        $(this).colorpicker({
            parts: 'full',
            showOn: 'both',
            buttonColorize: true,
            showNoneButton: true,
            alpha: true
        });
    });    
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>