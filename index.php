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
    $params = $Yaml::parse($page[1]);
    $content = $Parsedown->text($page[2]);

    require_once 'template/header.php';

    echo $content;

    require_once 'template/footer.php';