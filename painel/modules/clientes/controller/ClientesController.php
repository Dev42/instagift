<?php

class ClientesController {

    public function insertAction(Clientes $cliente) {

        if ($cliente->getNome() != "" && $cliente->getUserId() != "") {

            $clienteAr = $cliente->assocEntity();
            
            $fields = implode("`, `", array_keys($clienteAr));
            $values = implode("', '", $clienteAr);

            $strQuery = "INSERT INTO `insta892_instagift`.`" . $cliente->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

            mysql_query($strQuery);

            return true;
        } else {
            return false;
        }
    }

    public function editAction(Clientes $cliente){
        
        if ($cliente->getNome() != "" && $cliente->getUserId() != "") {

            $clienteAr = $cliente->assocEntity();
            
            $setQuery = array();
            foreach ($clienteAr as $k => $v){
                if ($v != ""){
                    $setQuery[] = "`".$k."` = '".$v."'";
                }
            }
            
            $setQuery = implode($setQuery, ", ");

            $sqlQuery = "UPDATE `insta892_instagift`.`".$cliente->tableName()."` SET $setQuery WHERE `cli_10_id` = ". $cliente->getId();
            
            mysql_query($sqlQuery);

            return true;
        } else {
            return false;
        }
        
    }
    
    public function countChilds(Clientes $cli, $from = "contato"){
        
        $sqlQuery = "SELECT COUNT(*) as total FROM `insta892_instagift`.`".$from."` WHERE `cli_10_id` = ". $cli->getId();
        
        $res = mysql_query($sqlQuery);
        
        return mysql_fetch_assoc($res);
        
    }

    public function deleteAction(User $user){
        
        if ($user->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$user->tableName()."` WHERE `cli_10_id` = ". $user->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false, $array = false) {

        $whereQuery = (!$id) ? "1 = 1" : "cli_10_id = " . $id;

        $strQuery = "SELECT * FROM clientes WHERE $whereQuery";
        $result = mysql_query($strQuery);

        $retArr = array();
        $i = 1;

        $cliente = new Clientes();
        
        if (mysql_num_rows($result) > 0) {

            if (!$array){
            
                while ($row = mysql_fetch_assoc($result)) {
                    $retArr[$i] = $cliente->fetchEntity($row);
                    $i++;
                }
                
            }else {
                
                while ($row = mysql_fetch_assoc($result)) {
                    $retArr[$row['cli_10_id']] = $row['cli_30_nome'];
                    $i++;
                }
                
            }
        }

        return $retArr;
    }

}

?>
