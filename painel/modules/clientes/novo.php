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
                                                            <li><span>Novo</span></li>
                                                    </ul>
                                            </div>
                                    </div>
                                    <div class="flat_area grid_16">
                                            <h2>Adicionar Cliente</h2>
                                            <p>Crie um novo usuário para que ele possa acessar o sistema.</p>
                                    </div>
                                    <div class="box grid_16 tabs">
                                        <form action="<?php echo $urlClientes;?>/action/crud.php?op=novo" method="post" id="cliForm" enctype="multipart/form-data">
                                            <ul class="tab_header clearfix">
                                                    <li><a href="#tabs-1">Geral</a></li>
                                                    <li><a href="#tabs-2">Web</a></li>
                                                    <li><a href="#tabs-3">Contato</a></li>
                                                    <li><a href="#tabs-4">Endereço</a></li>
                                            </ul>
                                            <div class="toggle_container">
                                                    <div id="tabs-1" class="block">
                                                        <fieldset class="label_side">
                                                                <label for="user_id">Usuário</label>
                                                                <div>
                                                                    <select name="user_id" id="user_id" class="select_box full_width">
                                                                        <?php
                                                                        $userController = new UserController();
                                                                        $userList = $userController->listAction();
                                                                        foreach ($userList as $k => $v) {
                                                                            echo "<option value='".$v['user_10_id']."'>".$v['user_30_username']."</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="nome">Nome</label>
                                                                <div>
                                                                    <input title="Nome para identificação do cliente." name="nome" id="nome" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                            <label for="doc1">Logo</label>
                                                            <div class="clearfix">
                                                                <input type="file" name="cli_logo" id="fileupload" class="uniform">
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="doc1" id="lblDoc1">Nome do cliente</label>
                                                                <div>
                                                                    <input title="Nome para identificação do cliente." style="width: 180px !important;" name="doc1" id="doc1" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="doc2" id="lblDoc2">CPF</label>
                                                                <div>
                                                                    <input title="Nome para identificação do cliente." style="width: 180px !important;" name="doc2" id="doc2" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side" id="fieldDoc3" style="display: none;">
                                                                <label for="doc3" id="lblDoc3">Insc. estadual</label>
                                                                <div>
                                                                    <input title="Nome para identificação do cliente." style="width: 180px !important;" name="doc3" id="doc3" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label>Tipo de cliente</label>
                                                                <div class="uniform inline clearfix">
                                                                    <label for="yes3b">
                                                                        <div class="radio" id="uniform-yes3b">
                                                                            <span class="">
                                                                                <input class="radTipo" type="radio" id="yes3b" value="1" checked="checked" name="cli_tipo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Físico
                                                                    </label>
                                                                    <label for="no3b">
                                                                        <div class="radio" id="uniform-no3b">
                                                                            <span class="checked">
                                                                                <input class="radTipo" type="radio" id="no3b" value="0" name="cli_tipo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Jurídico
                                                                    </label>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="obs_com">Observação Comercial</label>
                                                                <div>
                                                                    <textarea id="obs_com" name="obs_com" title="Coloque nesse campo qualquer informação comercial" class="tooltip autogrow" placeholder="Digite as observações comerciais do cliente"></textarea>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="obs_tec">Observação Técnica</label>
                                                                <div>
                                                                    <textarea id="obs_tec" name="obs_tec" title="Coloque nesse campo qualquer informação técnica" class="tooltip autogrow" placeholder="Digite as observações técnicas do cliente"></textarea>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label>Ativo</label>
                                                                <div class="uniform inline clearfix">
                                                                    <label for="yesAt3b">
                                                                        <div class="radio" id="uniform-yesAt3b">
                                                                            <span class="">
                                                                                <input type="radio" id="yesAt3b" value="1" checked="checked" name="cli_ativo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Sim
                                                                    </label>
                                                                    <label for="noAt3b">
                                                                        <div class="radio" id="uniform-noAt3b">
                                                                            <span class="checked">
                                                                                <input type="radio" id="noAt3b" value="0" name="cli_ativo" style="opacity: 0;">
                                                                            </span>
                                                                        </div>
                                                                        Não
                                                                    </label>
                                                                </div>
                                                        </fieldset>
                                                    </div>
                                                    <div id="tabs-2" class="block">
                                                        <fieldset class="label_side">
                                                            <label for="cli_site">Site</label>
                                                            <div>
                                                                <input title="Site do cliente." name="cli_site" id="cli_site" class="tooltip right" type="text">
                                                                <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                            <label for="cli_blog">Blog</label>
                                                            <div>
                                                                <input title="Blog do cliente" name="cli_blog" id="cli_blog" class="tooltip right" type="text">
                                                                <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                            <label for="cli_twitter">Twitter</label>
                                                            <div>
                                                                <input title="Twitter do cliente" name="cli_twitter" id="cli_twitter" class="tooltip right" type="text">
                                                                <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                            <label for="cli_facebook">Facebook</label>
                                                            <div>
                                                                <input title="Facebook do cliente" name="cli_facebook" id="cli_facebook" class="tooltip right" type="text">
                                                                <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                            <label for="cli_analytics">Analytics</label>
                                                            <div>
                                                                <input title="Site do cliente." name="cli_analytics" id="cli_analytics" class="tooltip right" type="text">
                                                                <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div id="tabs-3" class="block">
                                                        <div class="box grid_16">
                                                            <div class="block">
                                                                <table class="static"> 
                                                                    <thead> 
                                                                        <tr> 
                                                                            <th>Nome do contato</th> 
                                                                            <th>Tipo</th> 
                                                                            <th>Telefone</th> 
                                                                            <th>Email</th> 
                                                                            <th>
                                                                                <img id="tr_contato" class="lineClone" style="cursor: pointer; padding-top: 5px;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Adicionar Contato"/>
                                                                            </th> 
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="tbody_tr_contato"> 
                                                                        <tr id='1'>
                                                                            <td>
                                                                                <input type="text" name="contato_nome[]"/>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $cnt = new Contato();
                                                                                $cntTipo = $cnt->allContatoTipo();
                                                                                ?>
                                                                                <select name="contato_tipo[]" class="select_box">
                                                                                    <?php
                                                                                    foreach($cntTipo as $kCntTipo => $vCntTipo){
                                                                                    ?>
                                                                                        <option value="<?php echo $kCntTipo; ?>"><?php echo $vCntTipo; ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <div style="width: 30px;">
                                                                                    <input type="text" name="contato_ddd[]" />
                                                                                </div>
                                                                                <div class="col_75" style="margin-left: 10px;">
                                                                                    <input type="text" name="contato_tel[]" />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="contato_email[]" />
                                                                            </td>
                                                                            <td>
                                                                                <img style="padding-bottom: 12px;" id="rm_1_tr_contato" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Adicionar Contato"/>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_contato_inv" style="display: none;">
                                                                            <td>
                                                                                <input type="text" name="contato_nome[]"/>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $cnt = new Contato();
                                                                                $cntTipo = $cnt->allContatoTipo();
                                                                                ?>
                                                                                <select name="contato_tipo[]" class="select_box">
                                                                                    <?php
                                                                                    foreach($cntTipo as $kCntTipo => $vCntTipo){
                                                                                    ?>
                                                                                        <option value="<?php echo $kCntTipo; ?>"><?php echo $vCntTipo; ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <div style="width: 30px;">
                                                                                    <input type="text" name="contato_ddd[]" />
                                                                                </div>
                                                                                <div class="col_75" style="margin-left: 10px;">
                                                                                    <input type="text" name="contato_tel[]" />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="contato_email[]" />
                                                                            </td>
                                                                            <td>
                                                                                <img style="padding-bottom: 12px;" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Contato"/>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody> 
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tabs-4" class="block">
                                                        <div class="box grid_16">
                                                            <div class="block">
                                                                <table class="static"> 
                                                                    <thead> 
                                                                        <tr> 
                                                                            <th>Endereço</th> 
                                                                            <th>Número</th> 
                                                                            <th>Complemento</th> 
                                                                            <th>Cidade</th> 
                                                                            <th>Estado</th> 
                                                                            <th>CEP</th> 
                                                                            <th>
                                                                                <img id="tr_endereco" class="lineClone" style="cursor: pointer; padding-top: 5px;" src="<?php echo $urlGeral; ?>/images/icons/personal/plus.png" alt="Remover Contato"/>
                                                                            </th> 
                                                                        </tr> 
                                                                    </thead> 
                                                                    <tbody id="tbody_tr_endereco"> 
                                                                        <tr id='2'>
                                                                            <td>
                                                                                <input type="text" name="endereco_endereco[]"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_numero[]" style="width: 40px !important;"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_complemento[]" style="width: 90px !important;"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_cidade[]" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_estado[]" style="width: 30px !important;" maxlength="2" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_cep[]" maxlength="9" />
                                                                            </td>
                                                                            <td>
                                                                                <img style="padding-bottom: 12px;" id="rm_2_tr_endereco" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Endereço"/>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="tr_endereco_inv" style="display: none;">
                                                                            <td>
                                                                                <input type="text" name="endereco_endereco[]"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_numero[]" style="width: 40px !important;"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_complemento[]" style="width: 90px !important;"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_cidade[]" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_estado[]" style="width: 30px !important;" maxlength="2" />
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" name="endereco_cep[]" maxlength="9" />
                                                                            </td>
                                                                            <td>
                                                                                <img style="padding-bottom: 12px;" class="lineRemove" src="<?php echo $urlGeral; ?>/images/icons/personal/minus.png" alt="Remover Endereço"/>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody> 
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="button_bar clearfix">
                                                    <button class="green" type="submit">
                                                        <img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $urlGeral; ?>/images/icons/small/white/bended_arrow_right.png">
                                                        <span>Enviar</span>
                                                    </button>
                                                    <button class="red" onclick="history.go(-1);">
                                                        <img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $urlGeral; ?>/images/icons/small/white/bended_arrow_right.png">
                                                        <span>Cancelar</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
				</div>
			</div>
		</div>

<script type="text/javascript" src="<?php echo $urlGeral; ?>/scripts/geralScript.js"></script>
                
<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>