<?php
session_start();
error_reporting(E_ERROR);
if (!isset($_SESSION['LogadoInstagift'])){
	header("Location: produtos.php");
}else{
$menuClass = array("active","","");
$title = "Fechar pedido";
include("inc/header_site.php");
?>
	<div class="row login">
    	<div class="span12"><h1>Preencha a quantidade, os dados do comprador e do endereço de entrega do produto</h1></div>
    	<div class="span8">
        	<form name="contatoForm" class="form-stacked" method="post" action="process/processNovoCarrinho.php" id="fecharPedido">
            	<input type="hidden" value="<?php echo $_POST['prdId']; ?>" name="prdId" />
                
                <input type="hidden" value="<?php echo $_POST['urlFotos']; ?>" name="urlFotos" />
                
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome"/>
                
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email"/>
                
                <label for="telefone">Telefone</label>
                <input type="text" name="ddd" id="ddd" style="width: 30px;"/>
                <input type="text" name="telefone" id="telefone" style="width: 214px;" />
                
                <label for="quantidade">Quantidade</label>
                <select name="quantidade" id="quantidade" style="width:50px;">
                	<option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco"/>
                
                <label for="numero">Número</label>
                <input type="text" name="numero" id="numero" style="width: 50px;"/>
                
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento" />
                
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" />
                
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" />
                
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" />
                
                <label for="estado">Estado</label>
                <select name="estado" id="estado">
                    <option value="">Selecione...</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MG">MG</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="PR">PR</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RO">RO</option>
                    <option value="RS">RS</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SE">SE</option>
                    <option value="SP">SP</option>
                    <option value="TO">TO</option>
                </select>
                <br>
                <input type="submit" name="button" id="button" value="Confirmar" />
            </form>
        </div>
    </div>
<?php
include("inc/footer_site.php");
}
?>
