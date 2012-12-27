<?php


class Clientes {
    
    protected $id;
    
    protected $userId;
    
    protected $nome;
    
    protected $doc1;
    
    protected $doc2;
    
    protected $doc3;
    
    protected $obsCom;
    
    protected $obsTec;
    
    protected $image;
    
    protected $tipo;
    
    protected $ativo;
    
    protected $site;
    
    protected $blog;
    
    protected $twitter;
    
    protected $facebook;
    
    protected $analitycs;
    
    protected $file;

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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDoc1() {
        return $this->doc1;
    }

    public function setDoc1($doc1) {
        $this->doc1 = $doc1;
    }

    public function getDoc2() {
        return $this->doc2;
    }

    public function setDoc2($doc2) {
        $this->doc2 = $doc2;
    }

    public function getDoc3() {
        return $this->doc3;
    }

    public function setDoc3($doc3) {
        $this->doc3 = $doc3;
    }

    public function getObsCom() {
        return $this->obsCom;
    }

    public function setObsCom($obsCom) {
        $this->obsCom = $obsCom;
    }

    public function getObsTec() {
        return $this->obsTec;
    }

    public function setObsTec($obsTec) {
        $this->obsTec = $obsTec;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function getSite() {
        return $this->site;
    }

    public function setSite($site) {
        $this->site = $site;
    }

    public function getBlog() {
        return $this->blog;
    }

    public function setBlog($blog) {
        $this->blog = $blog;
    }

    public function getTwitter() {
        return $this->twitter;
    }

    public function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    public function getAnalytics() {
        return $this->analitycs;
    }

    public function setAnalitycs($analitycs) {
        $this->analitycs = $analitycs;
    }
    
    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function fetchEntity($row){
        
        $this->setId($row['cli_10_id']);
        $this->setUserId($row['user_10_id']);
        $this->setNome($row['cli_30_nome']);
        $this->setDoc1($row['cli_30_doc1']);
        $this->setDoc2($row['cli_30_doc2']);
        $this->setDoc3($row['cli_30_doc3']);
        $this->setObsCom($row['cli_35_obs_com']);
        $this->setObsTec($row['cli_35_obs_tec']);
        $this->setImage($row['cli_30_image']);
        $this->setTipo($row['cli_12_tipo']);
        $this->setAtivo($row['cli_12_ativo']);
        $this->setSite($row['cli_30_site']);
        $this->setBlog($row['cli_30_blog']);
        $this->setTwitter($row['cli_30_twitter']);
        $this->setFacebook($row['cli_30_facebook']);
        $this->setAnalitycs($row['cli_30_analitycs']);
        
        return $this;
    }
    
    public function assocEntity(){
        
        $fields = array(
            'cli_10_id' => $this->getId(),
            'user_10_id' => $this->getUserId(),
            'cli_30_nome' => $this->getNome(),
            'cli_30_doc1' => $this->getDoc1(),
            'cli_30_doc2' => $this->getDoc2(),
            'cli_30_doc3' => $this->getDoc3(),
            'cli_35_obs_com' => $this->getObsCom(),
            'cli_35_obs_tec' => $this->getObsTec(),
            'cli_30_image' => $this->getImage(true),
            'cli_12_tipo' => $this->getTipo(),
            'cli_12_ativo' => $this->getAtivo(),
            'cli_30_site' => $this->getSite(),
            'cli_30_blog' => $this->getBlog(),
            'cli_30_twitter' => $this->getTwitter(),
            'cli_30_facebook' => $this->getFacebook(),
            'cli_30_analitycs' => $this->getAnalytics()
        );
        
        return $fields;
        
    }
    
    public function tableName(){
        return "clientes";
    }
    
    public function getAbsolutePath() {
        return null === $this->image ? null : $this->getUploadRootDir() . $this->id . '.' . $this->image;
    }

    public function getWebPath() {
        return null === $this->image ? null : "/painel/images/".$this->getUploadDir() . $this->image;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../images/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/clientes/';
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
                return "/painel/images/uploads/no_photo.png";
            }else {
                return $this->getUploadRootDir().$this->image;
            }
        }
    }

    public function setImage($image) {
        $this->image = $image;
    }

    
    public function uploadImage() {

        if (null !== $this->file) {
            
            $imgEdit = new SimpleImage();
            
            if ($this->getImage(true) != ""){
                unlink($this->getImage());
            }
            
            $this->setImage(uniqid() . "-" . $this->getUserId() . $this->file["name"]);

            move_uploaded_file($this->file['tmp_name'], $this->getUploadRootDir().$this->getImage(true));
            
            $imgEdit->load($this->getUploadRootDir().$this->getImage(true));
            $imgEdit->resizeToWidth(220);
            $imgEdit->save($this->getUploadRootDir().$this->getImage(true));
            
            return true;
            
        }
    }
    
}

?>