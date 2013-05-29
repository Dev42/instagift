<?php
include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/classLoader.php';

function deleteDirectory($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
    }
    return rmdir($dir);
}

/* Foto Getter */

$numItem = $_GET['id'];
$tipo = $_GET['mod'];

$chtController = new ChartController();
$cht = $chtController->listAction($numItem, 1);
$pedId = $cht[1]["ped_10_id"];
$prodId = $cht[1]["produto_10_id"];

$prodController = new ProdutoController();
$prod = $prodController->listAction($prodId, 1);
$dimFotos = $prod[1]["produto_10_largura_minima"];

if($tipo == 't'){
	$photosDown = $cht[1]["cht_35_urlFotosTampa"];
	$nomeZip = "tampa_".$pedId."_".$numItem;
	$dir = "fotosTampaTemp/";
}else{
	$photosDown = $cht[1]["cht_35_urlFotos"];
	$nomeZip = "produto_".$pedId."_".$numItem;
	$dir = "fotosProdTemp/";
}

$imagesAr = explode(";", $photosDown);

$photo = new PhotosLoader($imagesAr,$nomeZip,$dir);
$photo->getPhotos();

$photoLoc = $dir.$nomeZip;
if ($handle = opendir($photoLoc)) {
    while (false !== ($file = readdir($handle))) {
        if (is_file($photoLoc."/".$file)){
            if ($file != "." && $file != ".."){
                $imageCutter = new ImageCutter($photoLoc."/".$file, $dimFotos);
                $imageCutter->generateImage($photoLoc."/resized/");
            }
        }
    }

    $photo->gerenetaPackage(true, $photoLoc."/resized/");
    
    closedir($handle);
}


?>