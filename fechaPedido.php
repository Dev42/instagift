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
	<div class="row login">
    	<div class="span12"><h1>Preencha os dados do comprador e do endereço de entrega do produto</h1></div>
    	<div class="span8">
        	<form name="contatoForm" class="form-stacked" method="post" action="process/processNovoCarrinho.php" id="fecharPedido">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome"/>
                
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email"/>
                
                <label for="telefone">Telefone</label>
                <input type="text" name="ddd" id="ddd" style="width: 30px;"/>
                <input type="text" name="telefone" id="telefone" style="width: 214px;" />
                
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" value="<?php echo $_SESSION['InstagiftCepEntrega']; ?>" readonly="readonly" />
                
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $logradouro; ?>"/>
                
                <label for="numero">Número</label>
                <input type="text" name="numero" id="numero" style="width: 50px;"/>
                
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento" />
                
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>" />
                
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>" />
                
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
                <br>
                <input type="submit" name="button" id="button" value="Confirmar" />
            </form>
        </div>
    </div>
<?php
include("inc/footer_site.php");
?>
