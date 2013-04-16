<?php

require_once "../painel/modules/pedidos/WebService/PagSeguro/PagSeguroLibrary/PagSeguroLibrary.php";
require_once '../painel/modules/pedidos/entity/Chart.php';

require_once '../painel/modules/produto/controller/ProdutoController.php';
require_once '../painel/modules/produto/entity/Produto.php';

require_once '../painel/modules/clientes/controller/EnderecoController.php';
require_once '../painel/modules/clientes/controller/ContatoController.php';
require_once '../painel/modules/clientes/entity/Endereco.php';
require_once '../painel/modules/clientes/entity/Contato.php';

/* 
 * Classe para solicitar o pagamento do item carrinho
 */

class processaPagamento {
    
    public function __construct(Chart $chart) {
        
        return $this;
    }
     
    public static function main () {
        $prdController = new ProdutoController();
        $prdInfo = $prdController->listAction($chart->getPrdId());
        $prd = new Produto();
        $prd->fetchEntity($prdInfo[1]);
        
        $endController = new EnderecoController();
        $endInfo = $endController->listAction(false, $chart->getCliId());
        
        $cntController = new ContatoController();
        $cntInfo = $cntController->listAction(false,$chart->getCliId());
        $cntInfo = new Contato();
        
        $paymentRequest = new PagSeguroPaymentRequest();
        $paymentRequest->setCurrency("BRL");
        
        $valTotal = $chart->getQuantidade()*$prd->getValor();
        
        $paymentRequest->addItem(
                $prd->getId(), 
                $prd->getNome(), 
                $valTotal, 
                $chart->getQuantidade(), 
                $prd->getPeso(), 
                $prd->getFrete()
                );
        
        $paymentRequest->setReference("REF00".$chart->getId());
        
        $CODIGO_ENTREGA = PagSeguroShippingType::getCodeByType('NOT_SPECIFIED');
        $paymentRequest->setShippingType($CODIGO_ENTREGA);
        
        /*
         * $paymentRequest->setShippingAddress(
                $endInfo[1]->getCep(),
                $endInfo[1]->getEndereco(),
                $endInfo[1]->getNumero(), 
                $endInfo[1]->getComplemento(),
                $endInfo[1]->getBairro(), 
                $endInfo[1]->getCidade(),
                $endInfo[1]->getEstado(),
                'BRA'
                );
         */
        $paymentRequest->setShippingAddress(
                "02420-001",
                "Avenida Zumkeller",
                "792", 
                "apto. 53",
                "Mandaqui", 
                "São Paulo",
                "SP",
                'BRA'
                );
        // Sets your customer information.
        /*$paymentRequest->setSender(
                $cntInfo[1]->getNome(),
                $cntInfo[1]->getEmail(), 
                $cntInfo[1]->getDdd(),
                $cntInfo[1]->getTel()
                );*/
        $paymentRequest->setSender(
                "André Simões",
                "andre.simoes@quup.com.br", 
                "11",
                "98214-3776"
                );

        $paymentRequest->setRedirectUrl("http://www.instagift.com.br");
        
        try {
            $credentials = new PagSeguroAccountCredentials("giftinsta@gmail.com", "F5163FDBEEA34F01B6911BB1E642E73E");

            $url = $paymentRequest->register($credentials);

            self::printPaymentUrl($url);

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
        
    }

    public static function printPaymentUrl($url) {
        if ($url) {
            echo "<h2>Criando requisi��o de pagamento</h2>";
            echo "<p>URL do pagamento: <strong>$url</strong></p>";
            echo "<p><a title=\"URL do pagamento\" href=\"$url\">Ir para URL do pagamento.</a></p>";
        }
    }
	
}

processaPagamento::main();

?>