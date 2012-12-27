<?php

class ProdutoFornecedor {
    
    protected $id;
    
    protected $idProduto;
    
    protected $idFornecedor;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function getIdFornecedor() {
        return $this->idFornecedor;
    }

    public function setIdFornecedor($idFornecedor) {
        $this->idFornecedor = $idFornecedor;
    }

    public function assocEntity(){
        
        $fields = array(
            "produto_fornecedor_10_id"            => $this->getId(),
            "produto_fornecedor_10_id_produto"    => $this->getIdProduto(),
            "produto_fornecedor_10_id_fornecedor" => $this->getIdFornecedor()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['produto_fornecedor_10_id']);
        $this->setIdProduto($row['produto_fornecedor_10_id_produto']);
        $this->setIdFornecedor($row['produto_fornecedor_10_id_fornecedor']);
        
        return $this;
    }
    
    public function tableName(){
        return "produto_fornecedor";
    }
    
}

?>