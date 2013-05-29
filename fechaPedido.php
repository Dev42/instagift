<?php
session_start();
error_reporting(E_ERROR);
$menuClass = array("active","","");
$title = "Fechar pedido";
include("inc/header_site.php");

$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=".$_SESSION['InstagiftCepEntrega']);

$estados = array("AC","AL","AM","AP","BA","CE","DF","ES","GO","MA","MG","MS","MT","PA","PB","PE","PI","PR","RJ","RN","RO","RS","RR","SC","SE","SP","TO");
 
$sucesso = (string) $reg->resultado;
if($sucesso == 1){
	$logradouro  = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
	$bairro = (string) $reg->bairro;
	$cidade  = (string) $reg->cidade;
	$estado  = (string) $reg->uf;
}else{
	$logradouro  = '';
	$bairro = '';
	$cidade  = '';
	$estado  = '';
}

?>
<script type="text/javascript">
jQuery(function($){
   $("#ddd").mask("99");
   $("#telefone").mask("99999999");
});
</script>
	<div class="row login">
    	<form name="contatoForm" class="form-stacked fecharPedido" method="post" action="process/processNovoCarrinho.php" id="fecharPedido">
            <div class="span12"><h1 style="text-transform:uppercase;">Dados pessoais</h1></div>
    		<div class="span11 dados">
            	<div class="field">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" id="nome"/>
                </div>
                <div class="field">
	                <label for="email">E-mail</label>
               		<input type="text" name="email" id="email"/>
                </div>
                <div class="field">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="ddd" id="ddd" style="width: 30px;"/>
                    <input type="text" name="telefone" id="telefone" style="width: 214px;" />
                </div>
             </div>   
             <div class="span12"><h1 style="text-transform:uppercase;">Endereço de entrega</h1></div>
    			<div class="span11 dados">
                    <div class="field">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" value="<?php echo $_SESSION['InstagiftCepEntrega']; ?>" readonly="readonly" />
                    </div>
                    <div class="field">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>" />
                    </div>
                    <div class="field">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado">
                            <option value="">Selecione...</option>
                            <?php
                                foreach($estados as $est){
                                    if($est == $estado){
                                        echo "<option value='".$est."' selected='selected'>".$est."</option>";	
                                    }else{
                                        echo "<option value='".$est."'>".$est."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <br style="clear:both;" />
                    <div class="field clearfix">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" value="<?php echo $logradouro; ?>"/>
                    </div>
                    <div class="field">
                        <label for="numero" style="width: 55px;">Número</label>
                        <input type="text" name="numero" id="numero" style="width: 50px;"/>
                    </div>
                    <div class="field">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="complemento" style="width: 180px;" />
                    </div>
                    <div class="field">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>" />
                    </div>
                    <br style="clear:both;" />
                </div>
        	<img src="images/site/btn-finalizar.jpg" onclick="validaFormPedido()" style="cursor:pointer; float:right; margin-right:20px;" />
        </form>
    </div>
<?php
include("inc/footer_site.php");
?>
