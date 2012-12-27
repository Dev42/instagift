<?php 
if ($_SERVER['SERVER_ADDR'] == "127.0.0.1" || $_SERVER['SERVER_ADDR'] == "::1"){ //Fix para IP v6 que o MAMP usa
    $urlGeral = "http://localhost/instagift/painel";
}else {
    $urlGeral = "http://instagift.com.br/painel";
}
include 'includes/header.php';
?>
		<div id="wrapper">	
			<div class="isolate">
				<div id="login_box" class="center" style="display:none;">
					<div class="main_container clearfix">
						<div class="box">
							<div class="block">
								<div class="section">
									<div class="alert dismissible alert_light">
										<img width="24" height="24" src="images/icons/small/grey/locked.png">
										<strong>Welcome to Adminica.</strong> Please enter your details to login.
									</div>
								</div>	
                                                            <form action="<?php echo $urlGeral; ?>/conf/security.php" class="validate_form" method="post">
								<fieldset class="label_side">
									<label for="username_field">Username<span>or email address</span></label>
									<div>
										<input type="text" name="username" id="username" class="required">
									</div>
								</fieldset>						
								<fieldset class="label_side">
									<label for="password_field">Password<span><a href="#">Do you remember?</a></span></label>
									<div>
										<input type="password" name="password" id="password_field" class="required">
									</div>
								</fieldset>
								<fieldset class="no_label">																											
									<div style="">
										<div class="slider_unlock" title="Slide to Login"></div>
										<button type="submit" style="display:none"></button>
									</div>
								</fieldset>
                                                            </form>	
							</div>
						</div>
						<a href="#" id="login_logo"><span>Adminica</span></a>
						<button data-dialog="dialog_register" class="on_dark dark dialog_button" style="float:right; margin:-30px 0 0 0;">
							<img src="images/icons/small/white/user.png">
							<span>Not Registered ?</span>
						</button>
					</div>
					<div class="main_container clearfix" style="display:none;">
						<div class="box">
							<div class="block">
								<div class="section">
									<div class="alert dismissible alert_light">
										<img width="24" height="24" src="images/icons/small/grey/locked.png">
										<strong>Welcome to Adminica.</strong> Please enter your details to login.
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<?php include 'includes/dialog_register.php'?>

<script type="text/javascript">
	$(".validate_form").validate();
</script>

<?php include 'includes/closing_items.php'?>