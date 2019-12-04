<?php

ini_set('display_errors', 'On');

    require __DIR__ . '/vendor/autoload.php';

    $Parsedown = new Parsedown();

    $file;
    $params = [];
    $content;

    if(file_exists('./content'.strtok($_SERVER["REQUEST_URI"],'?').'.txt')){
        $file = './content'.strtok($_SERVER["REQUEST_URI"],'?').'.txt';
    } else {
        $file = './content'.strtok($_SERVER["REQUEST_URI"],'?').'/index.txt';
    }

    if(isset($_POST['save'])){
        file_put_contents($file, $_POST['content']);
    }

    $raw_content = file_get_contents($file);

    $params = get_params($file);

    $content = $Parsedown->text($raw_content);

    if($_GET['admin'] == 'XYZ') {
        require_once 'template/admin.php';
    } else {
        require_once 'template/index.php';
    }

    function get_params($file_path){
        $params = [];
        $handle = fopen($file_path, 'r');

        if($handle){
            $first = true;
            while (($line = fgets($handle)) !== false) {
                if($first){
                    $first = false;
                    $params['title'] = $line;
                }
                $param = explode(': ', $line);
                if(count($param) > 1){
                    $params[strtolower($param[0])] = $param[1];
                }
            }
    
            fclose($handle);
        }

        return $params;
    }

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
