<?php

include "painel/modules/pedidos/WebService/PagSeguro/PagSeguroLibrary/PagSeguroLibrary.php";
include 'painel/conf/classLoader.php';

/* 
 * Classe para solicitar o pagamento do item carrinho
 */

class processaPagamento {
    
    public static function main (Pedidos $pedido) {
		$produtoController = new ProdutoController();
		
        $chtController = new ChartController();
        $chtList = $chtController->listAction($pedido->getId());
		
		echo var_dump($chtList);
		
        $paymentRequest = new PagSeguroPaymentRequest();
        $paymentRequest->setCurrency("BRL");
		
		foreach ($chtList as $kChart => $vChart){
			$prdList = $produtoController->listAction($vChart->getPrdId(), false);
			foreach ($prdList as $kProd => $vProd){
				$nomeProd = $vProd->getNome();
			}
			
			$paymentRequest->addItem(
				$vChart->getId(), 
				$nomeProd." - ".$vChart->getNome(), 
				$vChart->getQuantidade(), 
				$vChart->getValor()/$vChart->getQuantidade(), 
				$vChart->getPeso()*1000, 
				0
			);
		}
        
        $paymentRequest->setReference("REF00".$pedido->getId());
        
		$shipping = new PagSeguroShipping(); 
		
		$type = new PagSeguroShippingType(2); // objeto PagSeguroShippingType  
		$shipping->setType($type);
		
		$shipping->setCost($cost);  
		
		$endEntregaAr = Array(  
			'postalCode' => $pedido->getCep(),  
			'street' => $pedido->getLogradouro(),  
			'number' => $pedido->getNumero(),  
			'complement' => $pedido->getComplemento(),  
			'district' => $pedido->getBairro(),  
			'city' => $pedido->getCidade(),  
			'state' => $pedido->getEstado(),  
			'country' => 'BRA'  
		);  
		
		$address = new PagSeguroAddress($endEntregaAr); // objeto PagSeguroAddress  
		$shipping->setAddress($address); 
		
        $paymentRequest->setShipping($shipping); 
         
		$paymentRequest->setSender(
                $pedido->getNome(),
                $pedido->getEmail(), 
                $pedido->getDdd(),
                $pedido->getTelefone()
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