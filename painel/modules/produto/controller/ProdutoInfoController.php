<?php

class ProdutoInfoController {

    public function insertAction(ProdutoInfo $produto) {
			
        if ($produto->getNome() != "" && $produto->getDesc() != "" && $produto->getValor() != "" && $produto->getNrFotos() != "" && $produto->getPeso() != ""){

            $produtoAr = $produto->assocEntity();

            $fields = implode("`, `", array_keys($produtoAr));
            $values = implode("', '", $produtoAr);

            $strQuery = "INSERT INTO `insta892_instagift`.`" . $produto->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);
			
            $produtoId = mysql_insert_id();

            return $produtoId;
        } else {
            return 0;
        }
    }

    public function editAction(ProdutoInfo $produto){
        
        if ($produto->getNome() != "" && $produto->getDesc() != "" && $produto->getValor() != "" && $produto->getNrFotos() != "" && $produto->getPeso() != ""){
            $produtoAr = $produto->assocEntity();
            
            $setQuery = array();
            foreach ($produtoAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `insta892_instagift`.`".$produto->tableName()."` SET $setQuery WHERE `produto_info_10_id` = ". $produto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
            
        }
        
    }

    public function deleteByProdutoAction($produtoId){
        
        if ($produtoId != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`produto_info` WHERE `produto_10_id` = ". $produtoId;
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function deleteAction(ProdutoInfo $produto){
        
        if ($produto->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$produto->tableName()."` WHERE `produto_info_10_id` = ". $produto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }

    public function getProdutoAction($field, $value, $op = "=") {

        $field = addslashes($field);
        $value = addslashes($value);
        
        $strQuery = "SELECT * FROM produto_info WHERE ".$field . " = '" . $value."'";
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