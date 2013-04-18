<?php

class ProdutoFrontController {

    public function listAction($id = false, $where = "") {

        $whereQuery[] = (!$id) ? "1 = 1" : "produto_10_id = " . $id;
        $whereQuery[] = ($where != "") ? $where : "1 = 1";

        $strQuery = "SELECT * FROM produto WHERE ".implode(" AND ", $whereQuery)." ORDER BY produto_10_id DESC";
        $result = mysql_query($strQuery);

        $retArr = array();
        $i = 1;

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                $prd = new Produto();
                $retArr[$i] = $prd->fetchEntity($row);
                $i++;
            }
        }

        return $retArr;
    }
    
}

?>
