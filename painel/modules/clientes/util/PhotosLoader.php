<?php

include_once 'ImageCutter.php';

class PhotosLoader {

    private $photoList;
    private $pedId;
    private $dir;

    function __construct(array $photoList, $pedId = 1, $dir) {
        $this->setPhotoList($photoList);
        $this->setPedId($pedId);
        $this->setDir($dir);
    }

    public function setPedId($pedId) {
        $this->pedId = $pedId;
    }

    public function getPedId() {
        return $this->pedId;
    }

    public function setPhotoList($photoList) {
        $this->photoList = $photoList;
    }

    public function getPhotoList() {
        return $this->photoList;
    }

    public function setDir($dir) {
        $this->dir = $dir;
    }

    public function getDir() {
        return $this->dir;
    }

    function zipFiles($source, $destination) {
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));

        if (is_dir($source) === true) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($files as $file) {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..')))
                    continue;

                $file = realpath($file);

                if (is_dir($file) === true) {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                } else if (is_file($file) === true) {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        } else if (is_file($source) === true) {
            $zip->addFromString(basename($source), file_get_contents($source));
        }

        return $zip->close();
    }

    function getPhotos() {
        $dirCreate = $this->absolutePath() . $this->getPedId();
        if (!mkdir($dirCreate, 0777)) {
            die("Erro ao criar diretório principal!");
        }
        if (!mkdir($dirCreate . "/resized/", 0777)) {
            die("Erro ao criar diretório de redimencionamento!!");
        }

        foreach ($this->getPhotoList() as $k => $v) {
            file_put_contents($dirCreate . "/" . uniqid() . ".jpg", file_get_contents($v));
        }
    }

    function gerenetaPackage($download = true, $path = "") {
        if ($path != "") {
            $destLoc = str_replace("resized/", "", $path);
            $this->zipFiles($path, $destLoc.$this->getPedId() . ".zip");
        } else {
            $this->zipFiles($this->absolutePath(), $this->getPedId() . ".zip");
        }

        if ($download) {
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename=' . $this->getPedId() . '.zip');
            header('Content-Length: ' . filesize($this->getPedId() . '.zip'));
            readfile($this->getPedId() . '.zip');
        }
    }

    function absolutePath() {
        return $this->getDir();
    }

}

?>