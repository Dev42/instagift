<?php

class Produto {
    
    protected $id;
    
    protected $nome;
    
    protected $descCurta;
    
    protected $descCompleta;
    
    protected $valor;
    
    protected $peso;
    
    protected $prazoProducao;
    
    protected $larguraMinima;
    
    protected $alturaMinima;
    
    protected $minimoFotos;
    
    protected $active;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescCurta() {
        return $this->descCurta;
    }

    public function setDescCurta($descCurta) {
        $this->descCurta = $descCurta;
    }

    public function getDescCompleta() {
        return $this->descCompleta;
    }

    public function setDescCompleta($descCompleta) {
        $this->descCompleta = $descCompleta;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getPrazoProducao() {
        return $this->prazoProducao;
    }

    public function setPrazoProducao($prazoProducao) {
        $this->prazoProducao = $prazoProducao;
    }

    public function getLarguraMinima() {
        return $this->larguraMinima;
    }

    public function setLarguraMinima($larguraMinima) {
        $this->larguraMinima = $larguraMinima;
    }

    public function getAlturaMinima() {
        return $this->alturaMinima;
    }

    public function setAlturaMinima($alturaMinima) {
        $this->alturaMinima = $alturaMinima;
    }

    public function getMinimoFotos() {
        return $this->minimoFotos;
    }

    public function setMinimoFotos($minimoFotos) {
        $this->minimoFotos = $minimoFotos;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function __construct() {
        $this->setActive(1);
    }

    public function assocEntity(){
        
        $fields = array(
            "produto_10_id"       		=> $this->getId(),
            "produto_30_nome"     		=> $this->getNome(),
            "produto_30_desc_curta"  	=> $this->getDescCurta(),
            "produto_60_desc_completa"  => $this->getDescCompleta(),
            "produto_20_valor" 		 	=> $this->getValor(),
            "produto_20_peso"		 	=> $this->getPeso(),
            "produto_10_prazo_producao" => $this->getPrazoProducao(),
            "produto_10_largura_minima" => $this->getLarguraMinima(),
            "produto_10_altura_minima" 	=> $this->getAlturaMinima(),
            "produto_10_minimo_fotos"   => $this->getMinimoFotos(),
            "produto_12_active"   		=> $this->getActive()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['produto_10_id']);
        $this->setNome($row['produto_30_nome']);
        $this->setDescCurta($row['produto_30_desc_curta']);
        $this->setDescCompleta($row['produto_60_desc_completa']);
        $this->setValor($row['produto_20_valor']);
        $this->setPeso($row['produto_20_peso']);
        $this->setPrazoProducao($row['produto_10_prazo_producao']);
        $this->setLarguraMinima($row['produto_10_largura_minima']);
        $this->setAlturaMinima($row['produto_10_altura_minima']);
        $this->setMinimoFotos($row['produto_10_minimo_fotos']);
        $this->setActive($row['produto_12_active']);
        
        return $this;
    }
    
    public function tableName(){
        return "produto";
    }
    
}

?>