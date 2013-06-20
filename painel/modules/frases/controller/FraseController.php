<?php

class FraseController {

    public function insertAction(Frase $frase) {
		
        if ($frase->getNome() != ""){

            $fraseAr = $frase->assocEntity();

            $fields = implode("`, `", array_keys($fraseAr));
            $values = implode("', '", $fraseAr);

            $strQuery = "INSERT INTO `" . $frase->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);
			
            $fraseId = mysql_insert_id();

            return $fraseId;
        } else {
            return 0;
        }
    }

    public function editAction(Frase $frase){
        
        if ($frase->getId() != "" && $frase->getNome() != ""){
			
            $fraseAr = $frase->assocEntity();
            
            $setQuery = array();
            foreach ($fraseAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `".$frase->tableName()."` SET $setQuery WHERE `frase_10_id` = ". $frase->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
            
        }
        
    }

    public function deleteAction(Frase $frase){
        
        if ($frase->getId() != "") {
            
            $sqlQuery = "DELETE FROM `".$frase->tableName()."` WHERE `frase_10_id` = ". $frase->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "frase_10_id = " . $id;

        $strQuery = "SELECT * FROM frases WHERE ".implode(" AND ", $whereQuery);
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

    public function getFraseAction($field, $value, $op = "=") {

        $field = addslashes($field);
        $value = addslashes($value);
        
        $strQuery = "SELECT * FROM frases WHERE ".$field . " = '" . $value."'";
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