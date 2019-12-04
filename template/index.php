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
        // $img->setAttribute('class', 'img');
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

    if(isset($params['layout'])){
        if(file_exists('./template/parts/'.$params['layout'].'.php')){
            require_once 'parts/'.$params['layout'].'.php';
        }
    } else {
        echo $content;
    }

    require_once 'parts/footer.php';
