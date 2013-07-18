<?php

class UserFotoController {

    public function insertAction(UserFoto $userFoto) {
			
        if ($userFoto->getUserId() != "" && $userFoto->getPath() != ""){

            $userFotoAr = $userFoto->assocEntity();

            $fields = implode("`, `", array_keys($userFotoAr));
            $values = implode("', '", $userFotoAr);

            $strQuery = "INSERT INTO `" . $userFoto->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);

            return true;
        } else {
            return false;
        }
    }

    public function deleteAction(UserFoto $userFoto){
        
        if ($userFoto->getId() != "") {
            
            $sqlQuery = "DELETE FROM `".$userFoto->tableName()."` WHERE `fot_10_id` = ". $userFoto->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($userId) {

        $whereQuery[] = "usr_10_id = " . $userId;

        $strQuery = "SELECT * FROM user_foto WHERE ".implode(" AND ", $whereQuery);
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
