<?php

/*
 * Classe que gerencia as fotos que foram adicionadas pelo usuário
 */

/**
 * Description of UserFoto
 *
 * @author andre
 */
class UserFoto {
    
    private $id;
    
    private $userId;
    
    private $path;
    
    private $image;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function assocEntity(){
        
        $fields = array(
            "fot_10_id"       => $this->getId(),
            "usr_10_id"     => $this->getUserId(),
            "fot_30_path"   => $this->getPath()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['fot_10_id']);
        $this->setUserId($row['usr_10_id']);
        $this->setPath($row['fot_30_path']);
        
        return $this;
    }
     
    public function tableName(){
        return "user_foto";
    }
    
    
    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . $this->path;
    }

    public function getWebPath() {
        $ext = "";
        
        if($_SERVER['SERVER_ADDR'] == "127.0.0.1"){
            $ext = "/instagift";
        }
        
        return null === $this->path ? null : $ext."/images/".$this->getUploadDir() . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return dirname(__FILE__) . '/../../../../../images/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/user/';
    }
    
    public function getPath($edit = false){
        if ($edit){
            if ($this->path == ""){
                return "";
            }else {
                return $this->path;
            }
        }else {
            if ($this->path == ""){
                return "/images/uploads/produtos/no_photo.png";
            }else {
                return $this->getUploadRootDir().$this->path;
            }
        }
    }

    public function setPath($path) {
        $this->path = $path;
    }
    
    public function uploadImage() {

        if (null !== $this->url) {
            
            $imgEdit = new SimpleImage();
            
            if ($this->getImage(true) != ""){
                unlink($this->getImage());
            }
            
            $this->setImage(uniqid() . "-" . $this->getIdProduto() . $this->url["name"]);

            move_uploaded_file($this->image['tmp_name'], $this->getUploadRootDir().$this->getImage(true));
            
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

        $caminho = $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/modules/produto/user';

        $caminhoFoto = $caminho.$nomeUnico;

        $moverFoto = move_uploaded_file($nomeFoto, $caminhoFoto);
		
        return $nomeUnico;
    }

}

?>