<?php
session_start();
include "painel/modules/pedidos/WebService/PagSeguro/PagSeguroLibrary/PagSeguroLibrary.php";
include 'painel/conf/classLoader.php';

/* 
 * Classe para solicitar o pagamento do item carrinho
 */

class processaPagamento {
    
    public static function main (Pedidos $pedido) {
		$produtoController = new ProdutoFrontController();
		
        $chtController = new ChartController();
        $chtList = $chtController->listByPedido($pedido->getId());
		
        $paymentRequest = new PagSeguroPaymentRequest();
        $paymentRequest->setCurrency("BRL");
		
		foreach ($chtList as $kChart => $vChart){
			$prdList = $produtoController->listAction($vChart['produto_10_id'], false);
			foreach ($prdList as $kProd => $vProd){
				$nomeProd = $vProd->getNome();
			}
			
			$paymentRequest->addItem(
				$vChart['cht_10_id'], 
				$nomeProd." - ".$vChart['cht_30_nome'], 
				$vChart['cht_10_quantidade'], 
				$vChart['cht_20_valor']/$vChart['cht_10_quantidade'], 
				$vChart['cht_20_peso']*1000, 
				0
			);
		}
        
        $paymentRequest->setReference("REF00".$pedido->getId());
        
		$shipping = new PagSeguroShipping(); 
		
		$type = new PagSeguroShippingType(3); // objeto PagSeguroShippingType  
		$shipping->setType($type);
		
		$shipping->setCost($pedido->getValorFrete());  
		
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
			$_SESSION['InstagiftUrlPgto'] = base64_encode($url);
            header("Location: ../pagamento.php");
        }
    }
	
}

?>