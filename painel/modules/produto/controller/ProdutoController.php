<?php

class ProdutoController {

    public function insertAction(Produto $produto) {
			
        if ($produto->getNome() != "" && $produto->getDescCurta() != "" && $produto->getDescCompleta() != "" && $produto->getPrazoProducao() != "" && $produto->getLarguraMinima() != "" && $produto->getAlturaMinima() != "" && $produto->getMinimoFotos() != ""){

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

    public function editAction(Produto $produto){
        
        if ($produto->getNome() != "" && $produto->getDescCurta() != "" && $produto->getDescCompleta() != "" && $produto->getPrazoProducao() != "" && $produto->getLarguraMinima() != "" && $produto->getAlturaMinima() != "" && $produto->getMinimoFotos() != ""){
            $produtoAr = $produto->assocEntity();
            
            $setQuery = array();
            foreach ($produtoAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `insta892_instagift`.`".$produto->tableName()."` SET $setQuery WHERE `produto_10_id` = ". $produto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
            
        }
        
    }

    public function deleteAction(Produto $produto){
        
        if ($produto->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$produto->tableName()."` WHERE `produto_10_id` = ". $produto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false, $type = 3) {

        $whereQuery[] = (!$id) ? "1 = 1" : "produto_10_id = " . $id;

        $strQuery = "SELECT * FROM produto WHERE ".implode(" AND ", $whereQuery);
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