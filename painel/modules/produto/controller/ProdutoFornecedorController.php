<?php

class ProdutoFornecedorController {

    public function insertAction(ProdutoFornecedor $produtoFornecedor) {
			
        if ($produtoFornecedor->getIdProduto() != "" && $produtoFornecedor->getIdFornecedor() != ""){

            $produtoFornecedorAr = $produtoFornecedor->assocEntity();

            $fields = implode("`, `", array_keys($produtoFornecedorAr));
            $values = implode("', '", $produtoFornecedorAr);

            $strQuery = "INSERT INTO `insta892_instagift`.`" . $produtoFornecedor->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);

            return true;
        } else {
            return false;
        }
    }

    public function editAction(ProdutoFornecedor $produtoFornecedor) {
			
        if ($produtoFornecedor->getIdProduto() != "" && $produtoFornecedor->getIdFornecedor() != ""){

            $produtoFornecedorAr = $produtoFornecedor->assocEntity();
            
            $setQuery = array();
            foreach ($produtoFornecedorAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `insta892_instagift`.`".$produtoFornecedor->tableName()."` SET $setQuery WHERE `produto_fornecedor_10_id` = ". $produtoFornecedor->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            
            return false;
            
        }
        
    }

    public function deleteAction(ProdutoFornecedor $produtoFornecedor){
        
        if ($produtoFornecedor->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$produtoFornecedor->tableName()."` WHERE `produto_fornecedor_10_id` = ". $produtoFornecedor->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }

    public function deleteAllAction($idPrd = false, $idForn = false){
        
        $whereQuery[] = (!$idPrd) ? "1 = 1" : "produto_fornecedor_10_id_produto = " . $idPrd;
        $whereQuery[] = (!$idForn) ? "1 = 1" : "produto_fornecedor_10_id_fornecedor = " . $idForn;
        
        $produtoFornecedor = new ProdutoFornecedor();
        $sqlQuery = "DELETE FROM `insta892_instagift`.`".$produtoFornecedor->tableName()."` WHERE ".implode(" AND ", $whereQuery);
        mysql_query($sqlQuery);
            
        return true;
        
    }
    
    public function listAction($id = false, $idPrd = false, $idForn = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "produto_fornecedor_10_id = " . $id;
        $whereQuery[] = (!$idPrd) ? "1 = 1" : "produto_fornecedor_10_id_produto = " . $idPrd;
        $whereQuery[] = (!$idForn) ? "1 = 1" : "produto_fornecedor_10_id_fornecedor = " . $idForn;

        $strQuery = "SELECT * FROM produto_fornecedor WHERE ".implode(" AND ", $whereQuery);
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

    public function getProdutoFornecedorAction($field, $value, $op = "=") {

        $field = addslashes($field);
        $value = addslashes($value);
        
        $strQuery = "SELECT * FROM produto_fornecedor WHERE ".$field . " = '" . $value."'";
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
