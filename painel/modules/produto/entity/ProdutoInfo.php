<?php

class ProdutoInfo {
    
    protected $id;
    
    protected $idProduto;
    
    protected $nome;
    
    protected $valor;
    
    protected $desc;
	
	protected $nrFotos;
    
    protected $peso;
    
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }
	
	public function getNrFotos() {
        return $this->nrFotos;
    }

    public function setNrFotos($nrFotos) {
        $this->nrFotos = $nrFotos;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function assocEntity(){
        
        $fields = array(
            "produto_info_10_id"            => $this->getId(),
            "produto_10_id"                 => $this->getIdProduto(),
            "produto_info_30_nome"          => $this->getNome(),
            "produto_info_20_valor"         => $this->getValor(),
            "produto_info_35_desc"          => $this->getDesc(),
			"produto_info_10_nrFotos"       => $this->getNrFotos(),
            "produto_info_12_peso"          => $this->getPeso()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['produto_info_10_id']);
        $this->setIdProduto($row['produto_10_id']);
        $this->setNome($row['produto_info_30_nome']);
        $this->setValor($row['produto_info_20_valor']);
        $this->setDesc($row['produto_info_35_desc']);
	    $this->setNrFotos($row['produto_info_10_nrFotos']);
        $this->setPeso($row['produto_info_12_peso']);
        
        return $this;
    }
    
    public function tableName(){
        return "produto_info";
    }
    
}

?>