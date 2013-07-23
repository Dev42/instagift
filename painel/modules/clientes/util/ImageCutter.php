<?php

/*
 * Arquivo responsavel por cortar a imagem da forma correta
 * 
 * Dependencias: GD
 * 
 */

include_once 'SimpleImage.php';

class ImageCutter{
    
    private $file;
    
    private $width;
    
    private $height;
    
    private $maxSize;
    
    private $outImage;
    
    private $image;
    
    public function __construct($file, $maxSize){
        
        $this->setFile($file);
        $this->setMaxSize($maxSize);
        $this->initArchive();
    }

    public function initArchive(){
        $imgSize = getimagesize($this->file);
        $this->setWidth($imgSize[0]);
        $this->setHeight($imgSize[1]);
    }

    public function getMaiorLado(){
        
        if ($this->getHeight() > $this->getWidth()){
            return "height";
        }elseif($this->getWidth() > $this->getHeight()){
            return "width";
        }else {
            return "square";
        }
        
    }
    
    public function generateImage($path = ""){
        $fileName = explode(".", $this->getFile());
        $fileExtension = $fileName[count($fileName)-1];
        $fileName = $fileName[count($fileName)-2];
		session_start();
		foreach ($_SESSION['InstagiftArAssocFotos'] as $kAssoc => $vAssoc){
			if($vAssoc["idArquivo"] == $fileName){
				$urlFoto = $vAssoc["urlFoto"];
			}
		}
		$incFrase = false;
		foreach ($_SESSION['InstagiftArFrasesCool'] as $kFrases => $vFrases){
			if($urlFoto == $vFrases["frase_user_35_urlFoto"]){
				$incFrase = true;
				$urlFrase = $vFrases["frase_user_35_urlFrase"];
				$posicao = $vFrases["frase_user_30_posicao"];
				$widthFrase = $vFrases["frase_user_30_width"];
				array_splice($_SESSION['InstagiftArFrasesCool'], $kFrases, 1);
			}
		}
		
        if ($this->getMaiorLado() == "height"){
            $dif = $current_width = $current_height = $this->getMaxSize();
            
            $canvas = imagecreatetruecolor($this->getWidth(), $this->getWidth());
            $current_image = imagecreatefromjpeg($this->getFile());
            imagecopy($canvas, $current_image, 0, 0, 0, 0, $this->getWidth(), $this->getHeight());
            imagejpeg($canvas, $fileName."-out.".$fileExtension, 100);
            
            $this->setHeight($current_width);
            $this->setWidth($dif);
            
        }elseif($this->getMaiorLado() == "width"){
            
            $dif = $this->getWidth() - $this->getHeight();
            $difLado = round($dif/2);
            $current_width = $current_height = $this->getHeight();
            $canvas = imagecreatetruecolor($current_width, $current_height);
            $current_image = imagecreatefromjpeg($this->getFile());
            imagecopy($canvas, $current_image, 0, 0, $difLado, 0, $this->getWidth(), $this->getHeight());
            imagejpeg($canvas, $fileName."-out.".$fileExtension, 100);
            
            $this->setHeight($current_width);
            $this->setWidth($current_height);
            
        }else {
            $canvas = imagecreatetruecolor($this->getMaxSize(), $this->getMaxSize());
            $current_image = imagecreatefromjpeg($this->getFile());
            imagecopy($canvas, $current_image, 0, 0, 0, 0, $this->getWidth(), $this->getHeight());
            imagejpeg($canvas, $fileName."-out.".$fileExtension, 100);
            
            $this->setHeight($this->getMaxSize());
            $this->setWidth($this->getMaxSize());
            
        }
        $simpleImg = new SimpleImage();
        $simpleImg->load($fileName."-out.".$fileExtension);
        $simpleImg->resize($this->getMaxSize(),$this->getMaxSize());
        
        preg_match("@(.*)/(.*)/(.*?).jpg@is", $this->getFile(), $matchImage);
        if ($path == ""){
            $path = $matchImage[1]."/".$matchImage[2]."/";
        }
        $simpleImg->save($path.$matchImage[3]."-final.".$fileExtension);
        if (!unlink($fileName."-out.".$fileExtension)){
            die ("Erro ao deletar arquivo de saída!");
        }
		
		if($incFrase){
			$dadosFrase = calculaProporcao($posicao,$widthFrase);
			$fraseImg = new SimpleImage();
        	$fraseImg->load("../../../".$urlFrase);
			$fraseImg->resize($dadosFrase["width"]);
			$fraseImg->save($path.$urlFrase);
			
			$imagemFinal = imagecreatefromjpeg($path.$matchImage[3]."-final.".$fileExtension);
			$imagemFrase = imagecreatefrompng($path.$urlFrase);
			
			$imagemFraseX = imagesx($imagemFrase);
			$imagemFraseY = imagesy($imagemFrase);
			
			imagecopymerge($imagemFinal,$imagemFrase,$dadosFrase["left"],$dadosFrase["top"],0,0,$imagemFraseX,$imagemFraseY,100);
			imagejpeg($imagemFinal,$path.$matchImage[3]."-final.".$fileExtension);
			imagedestroy($path.$urlFrase);
		}
        
    }
    
    public function setFile($file){
        $this->file = $file;
    }
    
    public function getFile(){
        return $this->file;
    }

    public function setWidth($width){
        $this->width = $width;
    }
    
    public function getWidth(){
        return $this->width;
    }

    public function setHeight($height){
        $this->height = $height;
    }
    
    public function getHeight(){
        return $this->height;
    }

    public function setMaxSize($maxSize){
        $this->maxSize = $maxSize;
    }
    
    public function getMaxSize(){
        return $this->maxSize;
    }
    
    public function setOutImage($outImage){
        $this->outImage = $outImage;
    }
    
    public function getOutImage(){
        return $this->outImage;
    }
	
	public function calculaProporcao($pos,$widthFrase){
		$proporcao = $this->getMaxSize() / 300;
		$posicoes = explode(",", $pos);
		$posicaoLeft = round($posicoes[0] * $proporcao);
		$posicaoTop = round($posicoes[1] * $proporcao);
		$largura = round($widthFrase * $proporcao);
		
		$dadosFrase = array("left" => $posicaoLeft, "top" => $posicaoTop, "width" => $largura);
		
		return $dadosFrase;
	}
    
}

?>