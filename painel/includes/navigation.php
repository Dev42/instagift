<div id="nav_top" class="clearfix round_top">
	<ul class="clearfix">
		<li><a href="index.php"><img src="<?php echo $urlGeral; ?>/images/icons/small/grey/laptop.png"/></a></li>
	
                <?php
                if ($_SESSION['loginType'] < 3){
                ?>
		<li><a href="#"><img src="<?php echo $urlGeral; ?>/images/icons/small/grey/user.png"/><span>Fornecedores</span></a>
			<ul>
				<li><a href="<?php echo $urlUser; ?>/listarFornecedor.php"><span>Listar</span></a></li>
				<li><a href="<?php echo $urlUser; ?>/novoFornecedor.php"><span>Novo</span></a></li>
			</ul>
		</li>
                <?php
                }
                ?>
                
                <?php
                if ($_SESSION['loginType'] < 3){
                ?>
		<li><a href="#"><img src="<?php echo $urlGeral; ?>/images/icons/small/grey/shopping_cart_4.png"/><span>Produtos</span></a>
			<ul>
				<li><a href="<?php echo $urlProdutos; ?>/listarProduto.php"><span>Listar</span></a></li>
				<li><a href="<?php echo $urlProdutos; ?>/novoProduto.php"><span>Novo</span></a></li>
			</ul>
		</li>
                <?php
                }
                ?>
                
                <?php
                if ($_SESSION['loginType'] < 3){
                ?>
		<li><a href="#"><img src="<?php echo $urlGeral; ?>/images/icons/small/white/create_write.png"/><span>Pedidos  </span></a>
			<ul>
				<li><a href="<?php echo $urlPedidos; ?>/listarPedido.php"><span>Listar</span></a></li>
				<li><a href="<?php echo $urlPedidos; ?>/novoPedido.php"><span>Novo</span></a></li>
			</ul>
		</li>
                <?php
                }
                ?>
                
		<li><a href="#"><img src="<?php echo $urlGeral; ?>/images/icons/small/grey/apartment_building.png"/><span>Clientes</span></a>
			<ul>
				<li><a href="<?php echo $urlClientes; ?>/listar.php"><span>Listar</span></a></li>
				<li><a href="<?php echo $urlClientes; ?>/novo.php"><span>Novo</span></a></li>
				<li><a href="#"><span>Contato</span></a>
					<ul class="drawer">
						<li><a href="listarContato.php"><span>Listar</span></a></li>
						<li><a href="novoContato.php"><span>Novo</span></a></li>
					</ul>
				</li>
				<li><a href="#"><span>Endereço</span></a>
					<ul class="drawer">
						<li><a href="listarEndereco.php"><span>Listar</span></a></li>
						<li><a href="novoEndereco.php"><span>Novo</span></a></li>
					</ul>
				</li>
			</ul>
		</li>
                <?php
                if ($_SESSION['loginType'] == 1){
                ?>
		<li><a href="#"><img src="<?php echo $urlGeral; ?>/images/icons/small/grey/user.png"/><span>Admin</span></a>
			<ul>
				<li><a href="<?php echo $urlUser; ?>/listarAdmin.php"><span>Listar</span></a></li>
				<li><a href="<?php echo $urlUser; ?>/novoAdmin.php"><span>Novo</span></a></li>
			</ul>
		</li>
                <?php
                }
                ?>
		<li><a href="<?php echo $urlGeral; ?>/logout.php" class="dialog_button" data-dialog="logout"><img src="<?php echo $urlGeral; ?>/images/icons/small/grey/locked_2.png"/></a></li>
	</ul>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/painel/includes/dialog_logout.php'?>		

	
	
<script type="text/javascript">
	
	var currentPage = <?php echo $keyphrase ?> - 1; // This is only used in php to tell the nav what the current page is
	$('#nav_top > ul > li').eq(currentPage).addClass("current");
	$('#nav_top > ul > li').addClass("icon_only").children("a").children("span").parent().parent().removeClass("icon_only");
</script>

	
	<div id="mobile_nav">
		<div class="main"></div>
		<div class="side"></div>
	</div>
	
</div><!-- #nav_top -->
