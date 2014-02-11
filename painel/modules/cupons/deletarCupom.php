<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $cupomController = new CupomController();
    $cupom = $cupomController->listAction($_GET['id']);
    
    if (count($cupom) == 0){
        
        header("Location: $urlCupons/listarCupom.php?type=error&case=deletar&erron=3");
        
    }
    
}

?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '6'; include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/navigation.php';?>
                                    <div class="grid_16">
                                            <div class="indented round_all clearfix send_left">
                                                    <ul class="breadcrumb clearfix">
                                                            <li><a href="<?php echo $urlGeral; ?>/index.php"><div class="ui-icon ui-icon-home"></div></a></li>
                                                            <li><a href="<?php echo $urlCupom; ?>/listarCupom.php">Cupons</a></li>
                                                            <li><span>Deletar - <?php echo $cupom[1]["cupom_35_codigo"]; ?></span></li>
                                                    </ul>
                                            </div>
                                    </div>
					<div class="flat_area grid_16">
						<h2>Deletar Cupom</h2>
						<p>Delete um cupom para desabilitar seu uso.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <h2 class="section">
                                                        Tem certeza que deseja deletar o cupom <b><?php echo $cupom[1]["cupom_35_codigo"]; ?></b>?
                                                    </h2>
                                                    <form action="<?php echo $urlCupons;?>/action/crudCupom.php?op=deletar" method="post">
                                                        <div style="display: none;">
                                                            <input type="hidden" name="cupom_10_id" value="<?php echo $cupom[1]["cupom_10_id"]; ?>" />
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/closing_items.php' ?>