<?php

class EnderecoController {

    public function insertAction(Endereco $endereco) {

        if ($endereco->getClienteId() != "" && $endereco->getClienteId() != 0) {

            if ($endereco->getEndereco() != "" || $endereco->getCep() != "") {

                $enderecoAr = $endereco->assocEntity();

                $fields = implode("`, `", array_keys($enderecoAr));
                $values = implode("', '", $enderecoAr);

                $strQuery = "INSERT INTO `insta892_instagift`.`" . $endereco->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";
                mysql_query($strQuery);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editAction(Endereco $endereco){
        
        if ($endereco->getClienteId() != "" && $endereco->getClienteId() != 0) {

            if ($endereco->getEndereco() != "" || $endereco->getCep() != "") {

                $enderecoAr = $endereco->assocEntity();
            
                $setQuery = array();
                foreach ($enderecoAr as $k => $v){
                    if ($v != ""){
                        $setQuery[] = "`".$k."` = '".$v."'";
                    }
                }

                $setQuery = implode($setQuery, ", ");

                $sqlQuery = "UPDATE `insta892_instagift`.`".$endereco->tableName()."` SET $setQuery WHERE `end_10_id` = ". $endereco->getId();

                mysql_query($sqlQuery);

                return true;
            } else {
                if ($this->deleteAction($endereco)){
                    return true;
                }
                return false;
            }
        } else {
            return false;
        }
        
    }

    public function deleteAction(Endereco $endereco){
        
        if ($endereco->getId() != "") {
            
            $sqlQuery = "DELETE FROM `insta892_instagift`.`".$endereco->tableName()."` WHERE `end_10_id` = ". $endereco->getId();
            mysql_query($sqlQuery);
            
            return true;
            
        }else {
            return false;
        }
        
    }
    
    public function listAction($id = false, $cliId = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "end_10_id = " . $id;
        $whereQuery[] = (!$cliId) ? "1 = 1" : "cli_10_id = " . $cliId;

        $strQuery = "SELECT * FROM endereco WHERE ".  implode(" AND ", $whereQuery);
        
        $result = mysql_query($strQuery);

        $retArr = array();
        $i = 1;

        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_assoc($result)) {
                $endereco = new Endereco();
                $retArr[$i] = $endereco->fetchEntity($row);
                $i++;
            }
        }

        return $retArr;
    }

}

?>
