<?php
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

$userController = new UserController();
?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '6'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
					<div class="flat_area grid_16">
						<h2>Adicionar Cupom</h2>
						<p>Crie um cupom de desconto para um cliente.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlCupons;?>/action/crudCupom.php?op=novo" method="post">
                                                        <fieldset class="label_side">
                                                                <label for="valor">% de desconto</label>
                                                                <div>
                                                                    <input title="% de desconto (somente números sem %)." name="valor" id="valor" class="tooltip right" type="text">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="validade">Data de validade</label>
                                                                <div>
                                                                    <input title="Até quando o cupom pode ser usado" name="validade" id="validade" class="datepicker hasDatepiker" type="text">
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