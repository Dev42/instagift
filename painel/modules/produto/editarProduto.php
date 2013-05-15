<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $produtoController = new ProdutoController();
    $produto = $produtoController->listAction($_GET['id'] , 1);
    
    if (count($user) == 0){
        
        header("Location: $urlProdutos/listarProduto.php?type=error&case=editar&erron=3");
        
    }
    $prdClass = new Produto();
    $userController = new UserController();
    $fornController = new ProdutoFornecedorController();
    $listFornPrd = $fornController->listAction(false, $produto[1]["produto_10_id"]);
    $prdClass->fetchEntity($produto[1]);
}

?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '3'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
					<div class="flat_area grid_16">
						<h2>Editar Produto</h2>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlProdutos;?>/action/crudProduto.php?op=editar" method="post" enctype="multipart/form-data">
                                                        <fieldset class="label_side">
                                                                <label for="nome">Nome</label>
                                                                <div>
                                                                    <input title="Nome de identificação do produto." name="nome" id="nome" class="tooltip right" type="text" value="<?php echo $produto[1]["produto_30_nome"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="nome">Fornecedor</label>
                                                                <div class="listForn">
                                                                    <table id="tbody_tr_contato">
                                                                        <?php
                                                                        $i = 1;
                                                                        foreach($listFornPrd as $kForn => $vForn){
                                                                            $fornEnt = new ProdutoFornecedor();
                                                                            $fornEnt->fetchEntity($vForn);
                                                                        ?>
                                                                            <tr id="<?php echo $fornEnt->getId(); ?>">
                                                                                <td>
                                                                                    <select class="select_box full_width" name="prd_forn[]" required="required">
                                                                                        <?php
                                                                                            $listForn = $userController->listAction();
                                                                                            foreach($listForn as $k => $v){
                                                                                                $usr = new User();
                                                                                                $usr->fetchEntity($v);
                                                                                                echo "<option value='".$usr->getId()."' ".($usr->getId() == $fornEnt->getIdFornecedor() ? "selected='selected'" : "").">".$usr->getNome()."</option>";
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    if ($i == 1){
                                                                                    ?>
                                                                                        <img id="tr_contato" class="lineClone" style="cursor: pointer; padding-bottom: 5px;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Fornecedor"/>
                                                                                    <?php
                                                                                    }else{
                                                                                    ?>
                                                                                        <img id="rm_<?php echo $fornEnt->getId(); ?>_tr_contato" style="padding-bottom: 5px;" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Fornecedor"/>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                        $i++;
                                                                        }
                                                                        ?>
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
                                                                <label for="nome">Foto Principal</label>
                                                                <div class="listImages">
                                                                    <input type="file" class="uniform" name="prd_foto">
                                                                </div>
                                                                <div class="listImages">
                                                                    <?php echo '<img src="'.$prdClass->getWebPath('foto').'" width="240" style="vertical-align: middle;"/>'; ?>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="nome">Banner</label>
                                                                <div class="listImages">
                                                                    <input type="file" class="uniform" name="prd_banner">
                                                                </div>
                                                                <div class="listImages">
                                                                    <?php echo '<img src="'.$prdClass->getWebPath().'" width="530" style="vertical-align: middle;"/>'; ?>
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
                                                                <div class="listImages">
                                                                    <ul class="clearfix">
                                                                    <?php
                                                                        $fotoPrdController = new FotoProdutoController();
                                                                        $listFoto = $fotoPrdController->listAction(false, $produto[1]["produto_10_id"]);
                                                                        $i = 1;
                                                                        foreach($listFoto as $kFoto => $vFoto){
                                                                            $fotoEnt = new FotoProduto();
                                                                            $fotoEnt->fetchEntity($vFoto);
                                                                            echo '
                                                                            <li id="imgId_'.$fotoEnt->getId().'" style="float: left; list-style: none; border-radius: 3px; border: 2px solid #ccc; padding: 5px; margin: 5px 10px 10px 0px; line-height: 150px; display: block; width: 150px; height: 150px; cursor: pointer;" class="imageRemove">
                                                                                <img src="../../../'.$fotoEnt->getWebPath().'" width="150" style="vertical-align: middle;"/>
                                                                            </li>
                                                                            ';
                                                                            if ($i%3 == 0 && $i != 1){
                                                                                echo "<div style='clear:both; width: 0px; height: 0px;'></div>";
                                                                            }
                                                                            $i++;
                                                                        }
                                                                    ?>
                                                                    </ul>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side"style="height: auto;">
                                                                <label for="nome">Cores</label>
                                                                <div class="listImages">
                                                                    <?php
                                                                    $colorObj = json_decode($produto[1]['produto_40_cores']);
                                                                    ?>
                                                                    <table id="tbody_tr_color">
                                                                        <?php
                                                                        if (count($colorObj)>0){
                                                                            $corControle = 1;
                                                                            foreach($colorObj as $kCor => $vCor){
                                                                                echo '<tr id="'.$kCor.'" style="height: 25px;">';
                                                                                echo '<td>';
                                                                                echo '<input type="hidden" class="cp-full" value="'.$vCor->cor.'" name="prd_color[]"/><input type="text" value="'.$vCor->nome.'" name="prd_color_name[]" style="padding: 10px 0px 5px 6px; border-radius: 4px; border: #ccc solid 1px;"/>';
                                                                                echo '</td>';
                                                                                echo '<td>';
                                                                                echo '<div style="padding-top: 5px;">';
                                                                                if ($corControle == 1){
                                                                                    echo '<img id="tr_color" class="lineClone" style="cursor: pointer;" src="'.$urlGeral.'/images/icons/personal/plus.png" alt="Adicionar Imagem"/>';
                                                                                }else{
                                                                                    echo '<img style="cursor: pointer;" id="rm_'.$kCor.'_tr_color" class="lineRemove" src="'.$urlGeral.'/images/icons/personal/minus.png" alt="Remover Image"/>';
                                                                                }
                                                                                echo '</div>';
                                                                                echo '</td>';
                                                                                echo '<td>';
                                                                                echo '</td>';
                                                                                echo "</tr>";
                                                                                $corControle++;
                                                                            }
                                                                        }else{
                                                                        ?>
                                                                            <tr id="2" style="height: 25px;">
                                                                                <td>
                                                                                    <input type="hidden" class="cp-full" value="186aa7" name="prd_color[]"/><input type="text" name="prd_color_name[]" style="padding: 10px 0px 5px 6px; border-radius: 4px; border: #ccc solid 1px;"/>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="padding-top: 5px;">
                                                                                        <img id="tr_color" class="lineClone" style="cursor: pointer;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Imagem"/>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <tr id="tr_color_inv" style="display: none; height: 25px;">
                                                                            <td>
                                                                                <input type="hidden" class="cp-full" value="186aa7" name="prd_color[]"/><input type="text" name="prd_color_name[]" style="padding: 10px 0px 5px 6px; border-radius: 4px; border: #ccc solid 1px;"/>
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
                                                                    <input title="Descrição do produto na página de produtos." name="descCurta" id="descCurta" class="tooltip right" type="text" value="<?php echo $produto[1]["produto_30_desc_curta"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="descCompleta">Descrição Completa</label>
                                                                <div>
                                                                    <textarea title="Descrição do produto na sua página." name="descCompleta" id="descCompleta" class="tooltip right" type="text"><?php echo $produto[1]["produto_60_desc_completa"]; ?></textarea>
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
                                                                    <?php
                                                                    $prdInfo = new ProdutoInfoController();
                                                                    $prdListInfo = $prdInfo->getProdutoAction("produto_10_id", $_GET['id']);
                                                                    
                                                                    ?>
                                                                <table id="tbody_tr_opcaoCompra">
                                                                    <?php
                                                                        foreach($prdListInfo as $kListInfo => $vListInfo){
																			$produto_info_20_valor = str_replace('.',',',$vListInfo['produto_info_20_valor']);
																			$produto_info_12_peso = str_replace('.',',',$vListInfo['produto_info_12_peso']);
                                                                    ?>
                                                                            <tr id="<?php echo $vListInfo['produto_info_10_id']; ?>">
                                                                                <td>
                                                                                    <div>
                                                                                        <label for="produto_info_nome">Nome da Opção</label>
                                                                                        <input title="Nome da opção de compra." value="<?php echo $vListInfo['produto_info_30_nome']; ?>" name="produto_info_nome[]" id="produto_info_nome_<?php echo $vListInfo['produto_info_10_id']; ?>" class="text" type="text">
                                                                                    </div>
                                                                                    <br />
                                                                                    <div>
                                                                                        <label for="produto_info_desc">Descrição da Opção</label>
                                                                                        <input title="Descrição da opção de compra." value="<?php echo $vListInfo['produto_info_35_desc']; ?>" name="produto_info_desc[]" id="produto_info_desc_<?php echo $vListInfo['produto_info_10_id']; ?>" class="text" type="text">
                                                                                    </div>
                                                                                    <br />
                                                                                    <div style="float: left; width: 100px !important;">
                                                                                        <label for="produto_info_valor">Valor da Opção</label>
                                                                                        <input title="Valor da Opção (em reais)" style="width: 100px !important;" value="<?php echo $produto_info_20_valor; ?>" name="produto_info_valor[]" id="produto_info_valor_<?php echo $vListInfo['produto_info_10_id']; ?>" class="text" type="text">
                                                                                    </div>
                                                                                    <div style="float: left; width: 100px !important; margin-left: 10px;">
                                                                                        <label for="produto_info_nrFotos">Qtde Fotos</label>
                                                                                        <input title="Número de Fotos para o produto" style="width: 100px !important;" value="<?php echo $vListInfo['produto_info_10_nrFotos']; ?>" name="produto_info_nrFotos[]" id="produto_info_nrFotos_<?php echo $vListInfo['produto_info_10_id']; ?>" class="text" type="text">
                                                                                    </div>
                                                                                    <div style="float: left; width: 100px !important; margin-left: 10px; margin-bottom:20px;">
                                                                                        <label for="produto_info_peso">Peso da Opção</label>
                                                                                        <input title="Peso da Opção (em quilos)" style="width: 100px !important;" value="<?php echo $produto_info_12_peso; ?>" name="produto_info_peso[]" id="produto_info_peso_<?php echo $vListInfo['produto_info_10_id']; ?>" class="text" type="text">
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
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
                                                                    <input title="Prazo de produção do produto em dias." name="prazoProducao" id="prazoProducao" class="tooltip right" type="text" value="<?php echo $produto[1]["produto_10_prazo_producao"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="larguraMinima">Largura Mínima</label>
                                                                <div>
                                                                    <input title="Largura mínima de foto para o produto em px." name="larguraMinima" id="larguraMinima" class="tooltip right" type="text" value="<?php echo $produto[1]["produto_10_largura_minima"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="alturaMinima">Altura Mínima</label>
                                                                <div>
                                                                    <input title="Altura mínima de foto para o produto em px." name="alturaMinima" id="alturaMinima" class="tooltip right" type="text" value="<?php echo $produto[1]["produto_10_altura_minima"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="minimoFotos">Mínimo de Fotos</label>
                                                                <div>
                                                                    <input title="Número mínimo de fotos para o produto." name="minimoFotos" id="minimoFotos" class="tooltip right" type="text" value="<?php echo $produto[1]["produto_10_minimo_fotos"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label>Modelo de tela de compra</label>
                                                                <div class="uniform inline clearfix">
                                                                    <label for="yes3b">
                                                                        <div class="radio" id="uniform-yes3b">
                                                                            <span class="">
                                                                                <input class="radTipo" type="radio" id="yes3b" value="0" <?php echo ($produto[1]["produto_12_tipo"] == 0)? 'checked="checked"' : ""; ?> name="prd_tipo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Compra normal
                                                                    </label>
                                                                    <label for="no3b">
                                                                        <div class="radio" id="uniform-no3b">
                                                                            <span class="checked">
                                                                                <input class="radTipo" type="radio" id="no3b" value="1"  <?php echo ($produto[1]["produto_12_tipo"] == 1)? 'checked="checked"' : ""; ?> name="prd_tipo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Compra de caixa
                                                                    </label>
                                                                </div>
                                                        </fieldset>
                                                       
                                                        <div style="display: none;">
                                                            <input type="hidden" name="produto_10_id" value="<?php echo $produto[1]["produto_10_id"]; ?>" />
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

                
<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/isotope/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/fancybox/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/adminica/adminica_gallery.js"></script>

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