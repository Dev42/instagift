<?php

class FraseUser {
    
    protected $id;
    
    protected $chtId;
	
    protected $urlFoto;
	
    protected $fraseId;
	
	protected $posicao;
	
	protected $width;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
	
	public function getChtId() {
        return $this->chtId;
    }

    public function setChtId($chtId) {
        $this->chtId = $chtId;
    }

    public function getUrlFoto() {
        return $this->urlFoto;
    }

    public function setUrlFoto($urlFoto) {
        $this->urlFoto = $urlFoto;
    }
	
	public function getFraseId() {
        return $this->fraseId;
    }

    public function setFraseId($fraseId) {
        $this->fraseId = $fraseId;
    }
	
	public function getPosicao() {
        return $this->posicao;
    }

    public function setPosicao($posicao) {
        $this->posicao = $posicao;
    }
	
	public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function assocEntity(){
        
        $fields = array(
            "frase_user_10_id"  	  => $this->getId(),
            "cht_10_id"  			  => $this->getChtId(),
            "frase_user_35_urlFoto"   => $this->getUrlFoto(),
			"frase_10_id"   		  => $this->getFraseId(),
			"frase_user_30_posicao"   => $this->getPosicao(),
			"frase_user_30_width"     => $this->getWidth(),
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['frase_user_10_id']);
        $this->setChtId($row['cht_10_id']);
        $this->setUrlFoto($row['frase_user_35_urlFoto']);
		$this->setFraseId($row['frase_10_id']);
		$this->setPosicao($row['frase_user_30_posicao']);
		$this->setWidth($row['frase_user_30_width']);
        
        return $this;
    }
    
    public function tableName(){
        return "frases_user";
    }
}

?>
