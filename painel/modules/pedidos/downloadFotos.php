<?php

include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'] . '/instagift/painel/conf/classLoader.php';

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

if ($tipo == 't') {
    $photosDown = $cht[1]["cht_35_urlFotosTampa"];
    $nomeZip = "tampa_" . $pedId . "_" . $numItem;
    $dir = "fotosTampaTemp/";
    $imagesAr = array($photosDown);
} else {
    $photosDown = $cht[1]["cht_35_urlFotos"];
    $nomeZip = "produto_" . $pedId . "_" . $numItem;
    $dir = "fotosProdTemp/";
    $imagesAr = explode(";", $photosDown);
}

$correctDir = $_SERVER["DOCUMENT_ROOT"] . str_replace('downloadFotos.php', '', $_SERVER["SCRIPT_NAME"]) . $dir . $nomeZip;

if (file_exists($correctDir . '/' . $nomeZip . '.zip')) {
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $nomeZip . '.zip');
    header('Content-Length: ' . filesize($correctDir . '/' . $nomeZip . '.zip'));
    readfile($correctDir . '/' . $nomeZip . '.zip');
} else {
    $photo = new PhotosLoader($imagesAr, $nomeZip, $dir);
    $photo->getPhotos();

    $photoLoc = $dir . $nomeZip;
    if ($handle = opendir($photoLoc)) {
        while (false !== ($file = readdir($handle))) {
            if (is_file($photoLoc . "/" . $file)) {
                if ($file != "." && $file != "..") {
                    echo $file;
                    $imageCutter = new ImageCutter($photoLoc . "/" . $file, $dimFotos);
                    $imageCutter->generateImage($photoLoc . "/resized/");
                }
            }
        }

        $photo->gerenetaPackage(false, $correctDir . "/resized/");

        closedir($handle);
    }
}
?>