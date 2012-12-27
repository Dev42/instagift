<?php

class Pedidos {
    
    protected $id;
    
    protected $cliId;
    
    protected $prdId;
    
    protected $quantidade;
    
    protected $status;
    
    protected $statusPag;
    
    protected $payMode;
    
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

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatusPag() {
        return $this->statusPag;
    }

    public function setStatusPag($statusPag) {
        $this->statusPag = $statusPag;
    }

    public function getPayMode() {
        return $this->payMode;
    }

    public function setPayMode($payMode) {
        $this->payMode = $payMode;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function assocEntity(){
        
        $fields = array(
            "ped_10_id"       		=> $this->getId(),
            "user_10_id"     		=> $this->getCliId(),
            "produto_10_id"             => $this->getPrdId(),
            "ped_10_quantidade"         => $this->getQuantidade(),
            "ped_10_status"             => $this->getStatus(),
            "ped_10_pag_status"         => $this->getStatusPag(),
            "ped_10_paymode"            => $this->getPayMode(),
            "ped_22_created_at"         => $this->getCreatedAt()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['ped_10_id']);
        $this->setCliId($row['user_10_id']);
        $this->setPrdId($row['produto_10_id']);
        $this->setQuantidade($row['ped_10_quantidade']);
        $this->setStatus($row['ped_10_status']);
        $this->setStatusPag($row['ped_10_pag_status']);
        $this->setPayMode($row['ped_10_paymode']);
        $this->setCreatedAt($row['ped_22_created_at']);
        
        return $this;
    }
    
    public function tableName(){
        return "pedidos";
    }
    
}

?>