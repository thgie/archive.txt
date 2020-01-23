<?php

    require_once 'parts/header.php';

    $dom = new DOMDocument();
    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

    $imgs = $dom->getElementsByTagName('img');
    $as = $dom->getElementsByTagName('a');
    $ps = $dom->getElementsByTagName('p');

    if(!is_null($imgs[0])){
        $imgs[0]->setAttribute('class', 'header-img');
        echo '<div class="has-header"></div>';
    }

    foreach($imgs as $img){
        $img->setAttribute('src', $assets_path.$img->getAttribute('src'));
    }
    foreach($as as $a){
        $a->setAttribute('target', '_blank');
    }
    foreach($ps as $p){
        if (strpos($p->nodeValue, 'layout:') !== false) {
            $p->setAttribute('class', 'is-parameter');
        }
    }

    $content = $dom->saveHTML();

    if(isset($params['template'])){
        if(file_exists('./template/parts/'.$params['template'].'.php')){
            require_once 'parts/'.$params['template'].'.php';
        }
    } else {
        echo $content;
    }

    require_once 'parts/footer.php';
