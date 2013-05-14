<?php

class ContatoController {

    public function insertAction(Contato $contato) {

        if ($contato->getClienteId() != "" && $contato->getClienteId() != 0) {

            if ($contato->getNome() != "" && ($contato->getEmail() != "" || $contato->getTel() != "")) {

                $contatoAr = $contato->assocEntity();

                $fields = implode("`, `", array_keys($contatoAr));
                $values = implode("', '", $contatoAr);

                $strQuery = "INSERT INTO `insta892_instagift`.`" . $contato->tableName() . "` (`" . $fields . "`) VALUES('" . $values . "');";

                mysql_query($strQuery);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editAction(Contato $contato) {
        if ($contato->getClienteId() != "" && $contato->getClienteId() != 0) {

            if ($contato->getNome() != "" && ($contato->getEmail() != "" || $contato->getTel() != "")) {

                $contatoAr = $contato->assocEntity();
            
                $setQuery = array();
                foreach ($contatoAr as $k => $v){
                    if ($v != ""){
                        $setQuery[] = "`".$k."` = '".$v."'";
                    }
                }

                $setQuery = implode($setQuery, ", ");

                $sqlQuery = "UPDATE `insta892_instagift`.`".$contato->tableName()."` SET $setQuery WHERE `cnt_10_id` = ". $contato->getId();

                echo $sqlQuery;
                
                mysql_query($sqlQuery);

                return true;
            } else {
                if ($this->deleteAction($contato)){
                    return true;
                }
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteAction(Contato $contato) {

        if ($contato->getId() != "") {

            $sqlQuery = "DELETE FROM `insta892_instagift`.`" . $contato->tableName() . "` WHERE `cnt_10_id` = " . $contato->getId();
            mysql_query($sqlQuery);

            return true;
        } else {
            return false;
        }
    }
    
    

    public function listAction($id = false, $cliId = false) {

        $whereQuery[] = (!$id) ? "1 = 1" : "cnt_10_id = " . $id;
        $whereQuery[] = (!$cliId) ? "1 = 1" : "cli_10_id = " . $cliId;

        $strQuery = "SELECT * FROM contato WHERE ".  implode(" AND ", $whereQuery);
        
        $result = mysql_query($strQuery);

        $retArr = array();
        $i = 1;

        $contato = new Contato();
        
        if (mysql_num_rows($result) > 0) {

            while ($row = mysql_fetch_assoc($result)) {
                $contato = new Contato();
                $retArr[$i] = $contato->fetchEntity($row);
                $i++;
            }
        }

        return $retArr;
    }

}

?>
