<?php

class Chart {
    
    protected $id;
    
    protected $prdId;
	
    protected $pedId;
    
    protected $nome;
	
    protected $valor;
	
    protected $nrFotos;
	
    protected $peso;
    
    protected $urlFotos;
	
    protected $urlFotosTampa;
    
    protected $quantidade;
    
    protected $cor;
    
    protected $idLocal;
    
    protected $status;
    
    protected $username;
    
    protected $origem;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPrdId() {
        return $this->prdId;
    }

    public function setPrdId($prdId) {
        $this->prdId = $prdId;
    }
	
	public function getPedId() {
        return $this->pedId;
    }

    public function setPedId($pedId) {
        $this->pedId = $pedId;
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
	
	public function getUrlFotos() {
        return $this->urlFotos;
    }

    public function setUrlFotos($urlFotos) {
        $this->urlFotos = $urlFotos;
    }
	
	public function getUrlFotosTampa() {
        return $this->urlFotosTampa;
    }

    public function setUrlFotosTampa($urlFotosTampa) {
        $this->urlFotosTampa = $urlFotosTampa;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }
    
    public function getIdLocal() {
        return $this->idLocal;
    }

    public function setIdLocal($idLocal) {
        $this->idLocal = $idLocal;
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getOrigem() {
        return $this->origem;
    }

    public function setOrigem($origem) {
        $this->origem = $origem;
    }
        
    public function assocEntity(){
        
        $fields = array(
            "cht_10_id"       		=> $this->getId(),
            "produto_10_id"         	=> $this->getPrdId(),
            "ped_10_id"                 => $this->getPedId(),
            "cht_30_nome"         	=> $this->getNome(),
            "cht_20_valor"         	=> $this->getValor(),
            "cht_10_nrFotos"         	=> $this->getNrFotos(),
            "cht_20_peso"         	=> $this->getPeso(),
            "cht_35_urlFotos"         	=> $this->getUrlFotos(),
            "cht_35_urlFotosTampa"      => $this->getUrlFotosTampa(),
            "cht_10_quantidade"     	=> $this->getQuantidade(),
            "cht_30_cor"     		=> $this->getCor(),
            "cht_12_status"     	=> $this->getStatus(),
            "cht_30_username"     	=> $this->getUsername(),
            "cht_12_origem"     	=> $this->getOrigem()
        );
        
        return $fields;
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['cht_10_id']);
        $this->setPrdId($row['produto_10_id']);
        $this->setPedId($row['ped_10_id']);
        $this->setNome($row['cht_30_nome']);
        $this->setValor($row['cht_20_valor']);
        $this->setNrFotos($row['cht_10_nrFotos']);
        $this->setPeso($row['cht_20_peso']);
        $this->setUrlFotos($row['cht_35_urlFotos']);
        $this->setUrlFotosTampa($row['cht_35_urlFotosTampa']);
        $this->setQuantidade($row['cht_10_quantidade']);
        $this->setCor($row['cht_30_cor']);
        $this->setStatus($row['cht_12_status']);
        $this->setUsername($row['cht_30_username']);
        $this->setOrigem($row['cht_12_origem']);
        
        return $this;
    }
    
    public function tableName(){
        return "pedidos_chart";
    }
    
}

?>