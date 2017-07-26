<?php

    require __DIR__ . '/vendor/autoload.php';

    $Parsedown = new Parsedown();
    $Yaml = new Symfony\Component\Yaml\Yaml();

    $file;

    if(file_exists('./content'.$_SERVER['REQUEST_URI'].'.txt')){
        $file = './content'.$_SERVER['REQUEST_URI'].'.txt';
    } else {
        $file = './content'.$_SERVER['REQUEST_URI'].'/index.txt';
    }

    $page = explode('---', file_get_contents($file));
    $params = $Yaml::parse($page[0]);
    $content = $Parsedown->text($page[1]);

<<<<<<< HEAD
    require_once 'template/index.php';

    function remove_utf8_bom($text) {
        $bom = pack('H*','EFBBBF');
        $text = preg_replace("/^$bom/", '', $text);
        return $text;
    }

    function subfoldering($dir, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = $dir.DIRECTORY_SEPARATOR.$value;
            if(!is_dir($path)) {

            } else if($value != "." && $value != "..") {
                subfoldering($path, $results);
                $results[] = $path;
            }
        }

        return $results;
    }
=======
    require_once 'template/index.php';
>>>>>>> parent of 1cd6084... fixed BOM
