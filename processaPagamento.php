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
    
    public static function main (Chart $chart) {
        $prdController = new ProdutoController();
        $prdInfo = $prdController->listAction($chart->getPrdId());
        $prd = new Produto();
        $prd->fetchEntity($prdInfo[1]);
        
        $endController = new EnderecoController();
        $endInfo = $endController->listAction(false, $chart->getCliId());
        $countEnd = count($endInfo);
		
        $cntController = new ContatoController();
        $cntInfo = $cntController->listAction(false,$chart->getCliId());
        $countCnt = count($cntInfo);
		
        $paymentRequest = new PagSeguroPaymentRequest();
        $paymentRequest->setCurrency("BRL");
        
        $prodTotal = $chart->getQuantidade()*$prd->getValor();
		$freteTotal = $chart->getQuantidade()*$prd->getFrete();
		$valTotal = $prodTotal + $freteTotal;
        
        $paymentRequest->addItem(
                $prd->getId(), 
                $prd->getNome(), 
                $chart->getQuantidade(), 
                $valTotal, 
                $prd->getPeso()*1000, 
                0
                );
        
        $paymentRequest->setReference("REF00".$chart->getId());
        
        $CODIGO_ENTREGA = PagSeguroShippingType::getCodeByType('NOT_SPECIFIED');
        $paymentRequest->setShippingType($CODIGO_ENTREGA);
        
        $paymentRequest->setShippingAddress(
                $endInfo[$countEnd]->getCep(),
                $endInfo[$countEnd]->getEndereco(),
                $endInfo[$countEnd]->getNumero(), 
                $endInfo[$countEnd]->getComplemento(),
                $endInfo[$countEnd]->getBairro(), 
                $endInfo[$countEnd]->getCidade(),
                $endInfo[$countEnd]->getEstado(),
                'BRA'
                );
         
		$paymentRequest->setSender(
                $cntInfo[$countCnt]->getNome(),
                $cntInfo[$countCnt]->getEmail(), 
                $cntInfo[$countCnt]->getDdd(),
                $cntInfo[$countCnt]->getTel()
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
            header("Location: ../pagamento.php?url=".$url);
        }
    }
	
}

?>