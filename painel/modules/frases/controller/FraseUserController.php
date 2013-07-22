<?php

class FraseUserController {

    public function insertAction(FraseUser $fraseUser) {
		
        if ($fraseUser->getChtId() != "" || $fraseUser->getUrlFoto() != "" || $fraseUser->getFraseId() != "" || $fraseUser->getPosicao() != "" || $fraseUser->getWidth() != ""){

            $fraseUserAr = $fraseUser->assocEntity();

            $fields = implode("`, `", array_keys($fraseUserAr));
            $values = implode("', '", $fraseUserAr);

            $strQuery = "INSERT INTO `" . $fraseUser->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);
			
            $fraseUserId = mysql_insert_id();

            return $fraseUserId;
        } else {
            return 0;
        }
    }
    
    public function listAction($id = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "cht_10_id = " . $id;

        $strQuery = "SELECT * FROM frases_user WHERE ".implode(" AND ", $whereQuery);
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
        
        $strQuery = "SELECT * FROM frases_user WHERE ".$field . " = '" . $value."'";
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