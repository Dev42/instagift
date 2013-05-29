<?php
	function calculaFrete($cepDestino, $peso, $valor) {
		
		$cepOrigem = "04516-001";
		
        $url = "https://pagseguro.uol.com.br/desenvolvedor/simulador_de_frete_calcular.jhtml?postalCodeFrom=".$cepOrigem."&weight=".$peso."&value=".$valor."&postalCodeTo=".$cepDestino;  
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $url);  
		curl_setopt($ch, CURLOPT_VERBOSE, 1);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));  
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);  
		curl_setopt($ch, CURLOPT_POST, 0);  
		$result = curl_exec($ch);  
		$resultArray = curl_getinfo($ch);  
		curl_close($ch);
		
		return $result;
    }

?>
