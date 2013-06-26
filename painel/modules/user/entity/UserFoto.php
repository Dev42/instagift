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

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
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

}

?>