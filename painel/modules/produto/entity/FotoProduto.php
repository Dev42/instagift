<?php

class FotoProduto {
    
    protected $id;
    
    protected $idProduto;
    
    protected $url;
    
    protected $image;
    
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

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function assocEntity(){
        
        $fields = array(
            "foto_produto_10_id"         => $this->getId(),
            "foto_produto_10_id_produto" => $this->getIdProduto(),
            "foto_produto_30_url"        => $this->getImage(true)
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['foto_produto_10_id']);
        $this->setIdProduto($row['foto_produto_10_id_produto']);
        $this->setImage($row['foto_produto_30_url']);
        
        return $this;
    }
    
    public function tableName(){
        return "foto_produto";
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
        return __DIR__ . '/../../../../images/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/produtos/';
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
                return "/images/uploads/produtos/no_photo.png";
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
            
            $imgEdit = new SimpleImage();
            
            if ($this->getImage(true) != ""){
                unlink($this->getImage());
            }
            
            $this->setImage(uniqid() . "-" . $this->getIdProduto() . $this->url["name"]);

            move_uploaded_file($this->url['tmp_name'], $this->getUploadRootDir().$this->getImage(true));
            
            $imgEdit->load($this->getUploadRootDir().$this->getImage(true));
            $imgEdit->adjustImage(600,600);
            $imgEdit->save($this->getUploadRootDir().$this->getImage(true));
            
            return true;
            
        }
    }
    
    public function removeImage(){
        $fotoProduto = $this->getUploadRootDir().$this->getImage(true);
        unlink($fotoProduto);
    }
	
	public function uploadFoto($foto){
		$nomeFoto    = $foto['name'];
		$tamanhoFoto = $foto['size'];
		$tipoFoto    = $foto['type'];
		$tmpnameFoto = $foto['tmp_name'];
		
		$obj = new SimpleImage;
		$obj->load($tmpnameFoto);
		if($obj->getWidth() != 400){
			$obj->resizeToWidth(400);
			$obj->output();
		}
		
		preg_match("/\.(gif|png|jpg|jpeg){1}$/i", $nomeFoto, $ext);
		
		// Gera um nome único para a imagem
		$nomeUnico = uniqid(time()) . "." . $ext[1];
		
		$caminho = $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/modules/produto/images';
		
		$caminhoFoto = $caminho.$nomeUnico;
		
		$moverFoto = move_uploaded_file($nomeFoto, $caminhoFoto);
		
        return $nomeUnico;
    }
    
}

?>