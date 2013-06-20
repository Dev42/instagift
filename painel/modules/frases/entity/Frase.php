<?php

class Frase {
    
    protected $id;
    
    protected $nome;
	
    protected $url;
	
    protected $image;
    
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

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function assocEntity(){
        
        $fields = array(
            "frase_10_id"    => $this->getId(),
            "frase_35_nome"  => $this->getNome(),
            "frase_30_url"   => $this->getImage()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['frase_10_id']);
        $this->setNome($row['frase_35_nome']);
        $this->setImage($row['frase_30_url']);
        
        return $this;
    }
    
    public function tableName(){
        return "frases";
    }
	
	public function getAbsolutePath() {
        return null === $this->image ? null : $this->getUploadRootDir() . $this->image;
    }

    public function getWebPath() {
        $ext = "";
        
        if($_SERVER['SERVER_ADDR'] == "127.0.0.1"){
            $ext = "/instagift";
        }
        
        return null === $this->image ? null : $ext."/images/".$this->getUploadDir() . $this->image;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return dirname(__FILE__) . '/../../../../images/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/frases/';
    }
    
    public function getImage($edit = false){
        if ($edit){
            if ($this->image == ""){
                return "";
            }else {
                return $this->image;
            }
        }else {
            if ($this->image == ""){
                return "/images/uploads/frases/no_photo.png";
            }else {
                return $this->getUploadRootDir().$this->image;
            }
        }
    }

    public function setImage($image) {
        $this->image = $image;
    }

    
    public function uploadImage() {

        if (null !== $this->url) {
            
            if ($this->getImage(true) != ""){
                unlink($this->getImage());
            }
			
            $this->setImage(uniqid() . "-" . $this->getIdProduto() . $this->url["name"]);

            if(move_uploaded_file($this->url['tmp_name'], $this->getUploadRootDir().$this->getImage(true))){
            	return true;
            }else{
                return false;
            }
        }
    }
    
    public function removeImage(){
        $fotoFrase = $this->getUploadRootDir().$this->getImage(true);
        unlink($fotoFrase);
    }
}

?>
