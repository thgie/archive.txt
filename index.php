<?php

    ini_set('display_errors', 'On');

    require __DIR__ . '/vendor/autoload.php';

    $Parsedown = new Parsedown();

    $file;
    $assets_path;
    $params = [];
    $content;

    if(file_exists('./content'.strtok($_SERVER["REQUEST_URI"],'?').'.md')){
        $file = './content'.strtok($_SERVER["REQUEST_URI"],'?').'.md';
        $assets_path = '/content'.$_SERVER["REQUEST_URI"].DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
    } else {
        $file = './content'.strtok($_SERVER["REQUEST_URI"],'?').'/index.md';
        $assets_path = '/content'.$_SERVER["REQUEST_URI"].DIRECTORY_SEPARATOR;
    }

    $raw_content = file_get_contents($file);
    $page = explode('---', $raw_content);

    if(count($page) > 1){
        $params = get_params($page[0]);
        $content = $page[1];
    } else {
        $content = $page[0];
    }

    $content = $Parsedown->text($content);

    require_once 'template/index.php';

    function get_params($raw_params){
        $params = explode("\n", $raw_params);
        $ps = [
            'title' => '',
            'description' => 'Research Blog and Portfolio of Adrian Demleitner'
        ];

        foreach($params as $key => $param){
            $param = explode(': ', $param);
            if(count($param) > 1){
                $ps[trim(strtolower($param[0]))] = trim($param[1]);
            }
        }

        return $ps;
    }
