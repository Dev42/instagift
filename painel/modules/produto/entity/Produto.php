<?php

class Produto {
    
    protected $id;
    
    protected $nome;
    
    protected $descCurta;
    
    protected $descCompleta;
    
    protected $cores;
    
    protected $banner;
    
    protected $foto;
    
    protected $url;
    
    protected $url2;
    
    protected $prazoProducao;
    
    protected $larguraMinima;
    
    protected $alturaMinima;
    
    protected $minimoFotos;
    
    protected $tipo;
    
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

    public function getCores() {
        return $this->cores;
    }

    public function setCores($cores) {
        $this->cores = $cores;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl2() {
        return $this->url2;
    }

    public function setUrl2($url2) {
        $this->url2 = $url2;
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
    
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
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
            "produto_10_id"       	=> $this->getId(),
            "produto_30_nome"     	=> $this->getNome(),
            "produto_30_desc_curta"  	=> $this->getDescCurta(),
            "produto_60_desc_completa"  => $this->getDescCompleta(),
            "produto_40_cores" 		=> $this->getCores(),
            "produto_30_banner"   	=> $this->getBanner(true),
            "produto_30_foto"   	=> $this->getFoto(true),
            "produto_10_prazo_producao" => $this->getPrazoProducao(),
            "produto_10_largura_minima" => $this->getLarguraMinima(),
            "produto_10_altura_minima" 	=> $this->getAlturaMinima(),
            "produto_10_minimo_fotos"   => $this->getMinimoFotos(),
            "produto_12_tipo"   	=> $this->getTipo(),
            "produto_12_active"   	=> $this->getActive()
        );
        
        return $fields;
        
    }
    
    public function fetchEntity($row){
        
        $this->setId($row['produto_10_id']);
        $this->setNome($row['produto_30_nome']);
        $this->setDescCurta($row['produto_30_desc_curta']);
        $this->setDescCompleta($row['produto_60_desc_completa']);
        $this->setCores($row['produto_40_cores']);
        $this->setBanner($row['produto_30_banner']);
        $this->setFoto($row['produto_30_foto']);
        $this->setPrazoProducao($row['produto_10_prazo_producao']);
        $this->setLarguraMinima($row['produto_10_largura_minima']);
        $this->setAlturaMinima($row['produto_10_altura_minima']);
        $this->setMinimoFotos($row['produto_10_minimo_fotos']);
        $this->setTipo($row['produto_12_tipo']);
        $this->setActive($row['produto_12_active']);
        
        return $this;
    }
    
    public function tableName(){
        return "produto";
    }
    
    public function getAbsolutePath() {
        return null === $this->banner ? null : $this->getUploadRootDir() . $this->banner;
    }

    public function getWebPath($type = 'banner') {
        $ext = "";
        
        if($_SERVER['SERVER_ADDR'] == "127.0.0.1"){
            $ext = "/instagift";
        }
        if ($type == 'banner'){
            return null === $this->banner ? null : $ext."/images/".$this->getUploadBannerDir() . $this->banner;
        }else {
            return null === $this->foto ? null : $ext."/images/".$this->getUploadFotoDir() . $this->foto;
        }
    }

    protected function getUploadRootDir($type = 'banner') {
        // the absolute directory path where uploaded documents should be saved
        
        if ($type == "banner"){
            return __DIR__ . '/../../../../images/' . $this->getUploadBannerDir();
        }else {
            return __DIR__ . '/../../../../images/' . $this->getUploadFotoDir();
        }
    }

    protected function getUploadBannerDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/produtos/banners/';
    }

    protected function getUploadFotoDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/produtos/produto/';
    }
    
    public function getBanner($edit = false){
        if ($this->banner == ""){
            return "";
        }else {
            if ($edit){
                return $this->banner;
            }else {
                return $this->getUploadRootDir().$this->banner;
            }
        }
    }

    public function setBanner($banner) {
        $this->banner = $banner;
    }
    
    public function getFoto($edit = false){
        if ($this->foto == ""){
            return "";
        }else {
            if ($edit){
                return $this->foto;
            }else {
                return $this->getUploadRootDir('foto').$this->foto;
            }
        }
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
    
    public function uploadImage($type = 'banner') {

        if ($type == 'banner'){
        
            if (null !== $this->url) {
            
                $imgEdit = new SimpleImage();
            
                if ($this->getBanner(true) != ""){
                    unlink($this->getBanner());
                }

                $this->setBanner(uniqid() . "-" . $this->getId() . $this->url["name"]);

                move_uploaded_file($this->url['tmp_name'], $this->getUploadRootDir().$this->getBanner(true));

                $imgEdit->load($this->getUploadRootDir().$this->getBanner(true));
                $imgEdit->resize(960,338);
                $imgEdit->save($this->getUploadRootDir().$this->getBanner(true));

                return true;
                
            }
        }else {
        
            if (null !== $this->url2) {
            
                $imgEdit = new SimpleImage();
            
                if ($this->getFoto(true) != ""){
                    unlink($this->getFoto());
                }

                $this->setFoto(uniqid() . "-" . $this->getId() . $this->url2["name"]);

                move_uploaded_file($this->url2['tmp_name'], $this->getUploadRootDir('foto').$this->getFoto(true));

                $imgEdit->load($this->getUploadRootDir('foto').$this->getFoto(true));
                $imgEdit->resize(240,180);
                $imgEdit->save($this->getUploadRootDir('foto').$this->getFoto(true));
                
                return true;
            
            }
        }
    }
    
    public function removeImage($type = 'banner'){
        if ($type == 'banner'){
            $fotoProduto = $this->getUploadRootDir().$this->getBanner(true);
            unlink($fotoProduto);
        }else {
            $fotoProduto = $this->getUploadRootDir('foto').$this->getFoto(true);
            unlink($fotoProduto);
        }
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