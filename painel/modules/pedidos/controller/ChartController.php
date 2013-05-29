<?php

class ChartController {

    public function insertAction(Chart $chart) {
        
        if ($chart->getPrdId() != "" && $chart->getNome() != "" && $chart->getValor() != "" && $chart->getNrFotos() != "" && $chart->getPeso() != "" && $chart->getUrlFotos() != "" && $chart->getQuantidade() != "" && $chart->getCor() != ""){
            
            $chartAr = $chart->assocEntity(); 
			
            $fields = implode("`, `", array_keys($chartAr));
            $values = implode("', '", $chartAr);

            $strQuery = "INSERT INTO `insta892_instagift`.`" . $chart->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);
			
            $pedId = mysql_insert_id();

            return $chartId;
        } else {
            return 0;
        }
    }

    public function editAction(Chart $chart){
        
        if ($chart->getPrdId() != "" && $chart->getPedId() != "" && $chart->getNome() != "" && $chart->getValor() != "" && $chart->getNrFotos() != "" && $chart->getPeso() != "" && $chart->getUrlFotos() != "" && $chart->getQuantidade() != "" && $chart->getCor() != ""){
            
            $chartAr = $chart->assocEntity();
            
            $setQuery = array();
            foreach ($chartAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `insta892_instagift`.`".$chart->tableName()."` SET $setQuery WHERE `cht_10_id` = ". $chart->getId();
            mysql_query($sqlQuery);
            return true;
        }else {
            return false;
            
        }
        
    }

    public function deleteAction(Chart $chart){
        
        if ($chart->getId() != "") {
            
            $sqlQuery = "DELETE FROM `instagift`.`".$chart->tableName()."` WHERE `cht_10_id` = ". $chart->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "cht_10_id = " . $id;

        $strQuery = "SELECT * FROM pedidos_chart WHERE ".implode(" AND ", $whereQuery);
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
    
    public function listActionChart($userName = false, $origem = false, $status = false, $idChart=false) {

        $whereQuery[] = (!$userName) ? "1 = 1" : "cht_30_username = '" . $userName."'";
        $whereQuery[] = (!$origem) ? "1 = 1" : "cht_12_origem = " . $origem;
        $whereQuery[] = (!$status) ? "1 = 1" : "cht_12_status = " . $status;
        $whereQuery[] = (!$idChart) ? "1 = 1" : "cht_10_id= " . $idChart;

        $strQuery = "SELECT * FROM pedidos_chart WHERE ".implode(" AND ", $whereQuery);
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

    public function getProdutoAction($field, $value, $op = "=") {

        $field = addslashes($field);
        $value = addslashes($value);
        
        $strQuery = "SELECT * FROM pedidos_chart WHERE ".$field . " = '" . $value."'";
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

     public function listByPedido($idPedido) {


        $strQuery = "SELECT * FROM pedidos_chart WHERE ped_10_id = ".$idPedido;
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
    
}

?>
