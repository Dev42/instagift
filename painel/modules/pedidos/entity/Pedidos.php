<?php

class Pedidos {
    
    protected $id;
    
    protected $chartId;
    
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
    
    public function getChartId() {
        return $this->chartId;
    }

    public function setChartId($chartId) {
        $this->chartId = $chartId;
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
            "cht_10_id"     		=> $this->getChartId(),
            "ped_10_status"             => $this->getStatus(),
            "ped_10_pag_status"         => $this->getStatusPag(),
            "ped_10_paymode"            => $this->getPayMode(),
            "ped_22_created_at"         => $this->getCreatedAt()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['ped_10_id']);
        $this->setChartId($row['cht_10_id']);
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