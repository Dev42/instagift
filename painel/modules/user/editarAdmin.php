<?php
ob_start();
include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/header.php';

if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $userController = new AdminController();
    $user = $userController->listAction($_GET['id'], 1);
    
    if (count($user) == 0){
        
        header("Location: $urlUser/listarAdmin.php?type=error&case=editar&erron=3");
        
    }
    
}

?>
                <div id="wrapper">
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/topbar.php' ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/sidebar.php' ?>
				<div id="main_container" class="main_container container_16 clearfix">
				<?php $keyphrase = '5'; include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/navigation.php';?>
                                   
					<div class="flat_area grid_16">
						<h2>Editar Administrador</h2>
					</div>
					<div class="box grid_16">
                                                <div class="block">
                                                    <form action="<?php echo $urlUser;?>/action/crudAdmin.php?op=editar" method="post">
                                                        <fieldset class="label_side">
                                                                <label for="nome">Nome</label>
                                                                <div>
                                                                    <input title="Nome de identificação do administrador." name="nome" id="nome" class="tooltip right" type="text" value="<?php echo $user[1]["user_30_nome"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="contato">Cargo</label>
                                                                <div>
                                                                    <input title="Nome de identificação do responsavel." name="contato" id="contato" class="tooltip right" type="text" value="<?php echo $user[1]["user_30_contato"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="telefone_ddd">Telefone</label>
                                                                <div>
                                                                    <input title="DDD do telefone" name="telefone_ddd" id="telefone_ddd" style="width: 30px !important;" class="tooltip right" type="text" maxlength="2" value="<?php echo $user[1]["user_10_tel_ddd"]; ?>">
                                                                    <input title="Telefone para contato com a empresa." name="telefone" id="telefone" style="width: 80px !important;" class="tooltip right" type="text" maxlength="10" value="<?php echo $user[1]["user_10_tel"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="email">E-mail</label>
                                                                <div>
                                                                    <input title="Login para identificação do usuário." name="email" id="email" class="tooltip right" type="text" value="<?php echo $user[1]["user_30_email"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="login">Login</label>
                                                                <div>
                                                                    <input title="Login para identificação do usuário." name="login" id="login" class="tooltip right" type="text" value="<?php echo $user[1]["user_30_username"]; ?>">
                                                                    <div class="required_tag tooltip hover left" title="Esse campo é obrigatório"></div>
                                                                </div>
                                                        </fieldset>
                                                        <fieldset class="label_side">
                                                                <label for="senha">Senha</label>
                                                                <div>
                                                                    <input title="Senha de identificação do usuário" name="senha" id="senha" class="tooltip right" type="password">
                                                                </div>
                                                        </fieldset>
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/painel/includes/closing_items.php' ?>