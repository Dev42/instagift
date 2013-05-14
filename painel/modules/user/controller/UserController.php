<?php

class UserController {

    public function insertAction(User $user) {

        if ($user->getLogin() != "" && $user->getNome() != "" && $user->getContato() != "" && $user->getTelefone() != "" && $user->getSenha() != "" && $user->getEmail() != "") {

	    $user->encriptPassword();
            $userAr = $user->assocEntity();

            $fields = implode("`, `", array_keys($userAr));
            $values = implode("', '", $userAr);

            $strQuery = "INSERT INTO `insta892_instagift`.`" . $user->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);

            return true;
        } else {
            return false;
        }
    }

    public function editAction(User $user){
        
        if ($user->getLogin() != "" && $user->getNome() != "" && $user->getContato() != "" && $user->getTelefone() != "" && $user->getEmail() != "") {
            
            if ($user->getSenha() != ""){
                $user->setSenha($user->encriptPassword());
            }
            
            $userAr = $user->assocEntity();
            
            $setQuery = array();
            foreach ($userAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");
            
            $sqlQuery = "UPDATE `insta892_instagift`.`".$user->tableName()."` SET $setQuery WHERE `user_10_id` = ". $user->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            
            return false;
            
        }
        
    }

    public function deleteAction(User $user){
        
        if ($user->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$user->tableName()."` WHERE `user_10_id` = ". $user->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false, $type = 3, $active = 1) {

        $whereQuery[] = (!$id) ? "1 = 1" : "user_10_id = " . $id;
        $whereQuery[] = (!$type) ? "1 = 1" : "user_12_type = " . $type;
        $whereQuery[] = (!$active) ? "1 = 1" : "user_12_active = " . $active;

        $strQuery = "SELECT * FROM user WHERE ".implode(" AND ", $whereQuery);
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

    public function getFornecedorAction($field, $value, $op = "=", $active = "1") {

        $field = addslashes($field);
        $value = addslashes($value);
        
        $strQuery = "SELECT * FROM user WHERE ".$field . " = '" . $value."' and user_12_active = '".$active."'";
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
