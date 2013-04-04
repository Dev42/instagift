<?php

class Chart {
    
    protected $id;
    
    protected $cliId;
    
    protected $prdId;
    
    protected $prdConfig;
    
    protected $quantidade;
    
    protected $createdAt;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCliId() {
        return $this->cliId;
    }

    public function setCliId($cliId) {
        $this->cliId = $cliId;
    }

    public function getPrdId() {
        return $this->prdId;
    }

    public function setPrdId($prdId) {
        $this->prdId = $prdId;
    }

    public function getPrdConfig() {
        return $this->prdConfig;
    }

    public function setPrdConfig($prdConfig) {
        $this->prdConfig = $prdConfig;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function assocEntity(){
        
        $fields = array(
            "cht_10_id"       		=> $this->getId(),
            "user_10_id"     		=> $this->getCliId(),
            "produto_10_id"             => $this->getPrdId(),
            "cht_35_config"             => $this->getPrdConfig(),
            "cht_10_quantidade"         => $this->getQuantidade(),
            "cht_22_created_at"         => $this->getCreatedAt()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['cht_10_id']);
        $this->setCliId($row['user_10_id']);
        $this->setPrdId($row['produto_10_id']);
        $this->setPrdConfig($row['cht_35_config']);
        $this->setQuantidade($row['ped_10_quantidade']);
        $this->setCreatedAt($row['cht_22_created_at']);
        
        return $this;
    }
    
    public function tableName(){
        return "pedidos_chart";
    }
    
}

?>