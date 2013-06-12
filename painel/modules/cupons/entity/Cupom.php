<?php

class Cupom {
    
    protected $id;
    
    protected $codigo;
	
	protected $valor;
	
	protected $validade;
    
    protected $status;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
	
	public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getValidade() {
        return $this->validade;
    }

    public function setValidade($validade) {
        $this->validade = $validade;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function assocEntity(){
        
        $fields = array(
            "cupom_10_id"       	=> $this->getId(),
			"cupom_35_codigo"       => $this->getCodigo(),
            "cupom_10_valor"     	=> $this->getValor(),
            "cupom_22_validade"  	=> $this->getValidade(),
            "cupom_12_status"   	=> $this->getStatus()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['cupom_10_id']);
		$this->setCodigo($row['cupom_35_codigo']);
        $this->setValor($row['cupom_10_valor']);
        $this->setValidade($row['cupom_22_validade']);
        $this->setStatus($row['cupom_12_status']);
        
        return $this;
    }
    
    public function tableName(){
        return "cupom";
    }
}

?>