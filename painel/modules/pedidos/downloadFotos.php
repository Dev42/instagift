<?php
include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/connection.php';
include $_SERVER['DOCUMENT_ROOT'].'/instagift/painel/conf/classLoader.php';

function Zip($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                continue;

            $file = realpath($file);

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

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
if($tipo == 't'){
	$photosDown = $cht[1]["cht_35_urlFotosTampa"];
	$nomeZip = "tampa_".$pedId."_";
	$dir = "fotosTampaTemp/".$numItem;
}else{
	$photosDown = $cht[1]["cht_35_urlFotos"];
	$nomeZip = "produto_".$pedId."_";
	$dir = "fotosProdTemp/".$numItem;
}

$imagesAr = explode(";", $photosDown);

if (!is_dir($dir)){
	if (!mkdir($dir, 0777)){
		die("Erro ao criar diretório!");
	}
}else{
	deleteDirectory($dir);
}

$count = 1;
foreach($imagesAr as $k => $v){
        if (!is_dir($dir)){
            if (!mkdir($dir, 0777)){
                die("Erro ao criar diretório!");
            }
			file_put_contents($dir."/".  $count.".jpg", file_get_contents($v));
        }else {
            file_put_contents($dir."/".  $count.".jpg", file_get_contents($v));
        }
		$count++;
}

Zip($dir, $dir.".zip");
deleteDirectory($dir);
$nomeZip .= $numItem;

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$nomeZip.'.zip');
header('Content-Length: ' . filesize($dir.'.zip'));
readfile($dir.'.zip');

?>