<?php

class CupomController {

    public function insertAction(Cupom $cupom) {

        if ($cupom->getValor() != "" && $cupom->getValidade() != ""){

            $cupomAr = $cupom->assocEntity();

            $fields = implode("`, `", array_keys($cupomAr));
            $values = implode("', '", $cupomAr);

            $strQuery = "INSERT INTO `fotu_net_br`.`" . $cupom->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);

            $cupomId = mysql_insert_id();

            return $cupomId;
        } else {
            return 0;
        }
    }

    public function editAction(Cupom $cupom){

        if ($cupom->getId() != "" && $cupom->getCodigo() != "" && $cupom->getValor() != "" && $cupom->getValidade() != "" && $cupom->getStatus() != ""){

            $cupomAr = $cupom->assocEntity();

            $setQuery = array();
            foreach ($cupomAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }

            $setQuery = implode($setQuery, ", ");

            $sqlQuery = "UPDATE `fotu_net_br`.`".$cupom->tableName()."` SET $setQuery WHERE `cupom_10_id` = ". $cupom->getId();
            mysql_query($sqlQuery);

            return true;

        }else {
            return false;

        }

    }

    public function deleteAction(Cupom $cupom){

        if ($cupom->getId() != "") {

            $sqlQuery = "DELETE FROM `fotu_net_br`.`".$cupom->tableName()."` WHERE `cupom_10_id` = ". $cupom->getId();
            mysql_query($sqlQuery);

            return true;

        }else {
            return false;
        }

    }

    public function listAction($id = false, $type = 3) {

        $whereQuery[] = (!$id) ? "1 = 1" : "cupom_10_id = " . $id;

        $strQuery = "SELECT * FROM cupom WHERE ".implode(" AND ", $whereQuery);
        $result = mysql_query($strQuery);

        $retArr = array();
        $i = 1;

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_assoc($result)) {
                $retArr[$i] = $row;
                $i++;
            }
        }

        return $retArr;
    }

    public function getCupomAction($field, $value, $op = "=") {

        $field = addslashes($field);
        $value = addslashes($value);

        $strQuery = "SELECT * FROM cupom WHERE ".$field . " = '" . $value."'";
        $result = mysql_query($strQuery);

        $retArr = array();
        $i = 1;

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_assoc($result)) {
                $retArr[$i] = $row;
                $i++;
            }
        }

        return $retArr;
    }


	public function verificaCupom($codigo) {
        $strQuery = "SELECT * FROM cupom WHERE cupom_35_codigo = '".$codigo."'";
        $result = mysql_query($strQuery);

		$retArr = array();
       	$i = 1;

        if (mysql_num_rows($result) > 0) {
           	 while ($row = mysql_fetch_assoc($result)) {
                $retArr[$i] = $row;
                $i++;
            }
			return $retArr[1]["cupom_10_valor"];
        }else{
			return 0;
		}
    }

	public function aprovaCupom($codigo) {
        $strQuery = "SELECT * FROM cupom WHERE cupom_35_codigo = '".$codigo."'";
        $result = mysql_query($strQuery);

        if (mysql_num_rows($result) > 0) {
           return false;
        }

        return true;
    }

	public function desabilitaCupom($codigo) {
        $strQuery = "UPDATE cupom SET cupom_12_status = '1' WHERE cupom_35_codigo = '".$codigo."'";
        $result = mysql_query($strQuery);

        return true;
    }

	public function gerarCodigoCupom(){
		$codigo = time();
		$codigo = md5($codigo);
		$codigo = base64_encode($codigo);
		$codigo = strtoupper($codigo);
		$codigo = substr($codigo,0,25);

		if($this->aprovaCupom($codigo)){
			return $codigo;
		}else{
			return gerarCodigoCupom();
		}
	}

}

?>