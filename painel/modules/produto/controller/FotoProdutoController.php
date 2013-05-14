<?php

class FotoProdutoController {

    public function insertAction(FotoProduto $fotoProduto) {
			
        if ($fotoProduto->getIdProduto() != "" && $fotoProduto->getUrl() != ""){

            $fotoProdutoAr = $fotoProduto->assocEntity();

            $fields = implode("`, `", array_keys($fotoProdutoAr));
            $values = implode("', '", $fotoProdutoAr);

            $strQuery = "INSERT INTO `insta892_instagift`.`" . $fotoProduto->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);

            return true;
        } else {
            return false;
        }
    }

    public function editAction(FotoProduto $fotoProduto){
        
        if ($fotoProduto->getIdProduto() != "" && $fotoProduto->getUrl() != ""){
            
			$fotoProdutoAr = $fotoProduto->assocEntity();
            
            $setQuery = array();
            foreach ($fotoProdutoAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `insta892_instagift`.`".$fotoProduto->tableName()."` SET $setQuery WHERE `foto_produto_10_id` = ". $fotoProduto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            
            return false;
            
        }
        
    }

    public function deleteAction(FotoProduto $fotoProduto){
        
        if ($fotoProduto->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$fotoProduto->tableName()."` WHERE `foto_produto_10_id` = ". $fotoProduto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false, $prdId = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "foto_produto_10_id = " . $id;
        $whereQuery[] = (!$prdId) ? "1 = 1" : "foto_produto_10_id_produto = " . $prdId;

        $strQuery = "SELECT * FROM foto_produto WHERE ".implode(" AND ", $whereQuery);
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

    public function getFotoProdutoAction($field, $value, $op = "=") {

        $field = addslashes($field);
        $value = addslashes($value);
        
        $strQuery = "SELECT * FROM foto_produto WHERE ".$field . " = '" . $value."'";
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
