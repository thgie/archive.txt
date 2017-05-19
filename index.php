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

    require_once 'template/index.php';