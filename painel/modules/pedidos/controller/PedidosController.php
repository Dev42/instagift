<?php

class PedidosController {

    public function insertAction(Pedidos $pedido) {
        
        if ($pedido->getPayMode() != "" && $pedido->getPrdId() && $pedido->getCliId() != "" && $pedido->getQuantidade()){
            
            $pedidoAr = $pedido->assocEntity(); 
			
            $fields = implode("`, `", array_keys($pedidoAr));
            $values = implode("', '", $pedidoAr);

            $strQuery = "INSERT INTO `instagift`.`" . $pedido->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);
			
            $pedId = mysql_insert_id();

            return $pedId;
        } else {
            return 0;
        }
    }

    public function editAction(Pedidos $pedido){
        
        if ($pedido->getPayMode() != "" && $pedido->getPrdId() && $pedido->getCliId() != "" && $pedido->getQuantidade()){
            
            $pedidoAr = $pedido->assocEntity();
            
            $setQuery = array();
            foreach ($pedidoAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `instagift`.`".$pedido->tableName()."` SET $setQuery WHERE `ped_10_id` = ". $pedido->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
            
        }
        
    }

    public function deleteAction(Pedidos $pedido){
        
        if ($pedido->getId() != "") {
            
            $sqlQuery = "DELETE FROM `instagift`.`".$pedido->tableName()."` WHERE `produto_10_id` = ". $pedido->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false, $status = 1) {

        $whereQuery[] = (!$id) ? "1 = 1" : "ped_10_id = " . $id;
        $whereQuery[] = (!$status) ? "1 = 1" : "ped_10_status = " . $status;

        $strQuery = "SELECT * FROM pedidos WHERE ".implode(" AND ", $whereQuery);
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
        
        $strQuery = "SELECT * FROM produto WHERE ".$field . " = '" . $value."'";
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
