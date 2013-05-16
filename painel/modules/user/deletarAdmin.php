<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $userController = new AdminController();
    $user = $userController->listAction($_GET['id'], 1);
    
    if (count($user) == 0){
        
        header("Location: $urlUser/listarAdmin.php?type=error&case=deletar&erron=3");
        
    }
    
}

?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '2'; include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/navigation.php';?>
					<div class="flat_area grid_16">
						<h2>Deletar Admin</h2>
						<p>Delete um admin para que ele não possa mais acessar o sistema.</p>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <h2 class="section">
                                                        Tem certeza que deseja deletar o usuário <b><?php echo $user[1]["user_30_username"]; ?></b>?
                                                    </h2>
                                                    <form action="<?php echo $urlUser;?>/action/crudAdmin.php?op=deletar" method="post">
                                                        <div style="display: none;">
                                                            <input type="hidden" name="user_10_id" value="<?php echo $user[1]["user_10_id"]; ?>" />
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/includes/closing_items.php' ?>