<?php

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


/* Foto Getter */

/* Esse array de fotos será preenchido pelo PHP
 * 
 * Serão as fotos que foram enviadas para o pedido! :)
 * 
 */
$photosAr = array(
"http://distilleryimage10.s3.amazonaws.com/cb2e23faa10d11e2aee522000a9f15b9_7.jpg",
"http://distilleryimage0.s3.amazonaws.com/2bbf0580754f11e2b52d22000a9f189b_7.jpg",
"http://distilleryimage8.s3.amazonaws.com/8a192bfc74ae11e2a56722000a1f9d88_7.jpg",
"http://distilleryimage2.s3.amazonaws.com/bb37c6625c4e11e2843f22000a9e0722_7.jpg",
"http://distilleryimage9.s3.amazonaws.com/3c05740045d511e281d622000a1f975c_7.jpg",
"http://distilleryimage2.s3.amazonaws.com/9caf79f4440e11e2a9d522000a1fb17d_7.jpg",
"http://distilleryimage3.s3.amazonaws.com/811926b43bf211e2ace922000a1f90f6_7.jpg",
"http://distilleryimage10.s3.amazonaws.com/9e5ae2763b3e11e2a84922000a1f8c0f_7.jpg");

$numPedido = "424";
$dir = "/var/www/instagift-crawler/".$numPedido;
foreach($photosAr as $k => $v){
        if (!is_dir($dir)){
            if (!mkdir($dir, 0777)){
                die("Erro ao criar diretório!");
            }
        }else {
            file_put_contents($dir."/".  uniqid().".jpg", file_get_contents($v));
        }
}

Zip($dir, $dir.".zip");

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$dir.'.zip');
header('Content-Length: ' . filesize($dir.'.zip'));
readfile($dir.'.zip');

?>