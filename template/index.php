<?php

    require_once 'parts/header.php';

    if(isset($params['layout'])){
        if(file_exists('./template/parts/header-'.$params['layout'].'.php')){
            require_once 'parts/header-'.$params['layout'].'.php';
        }
        if(file_exists('./template/parts/'.$params['layout'].'.php')){
            require_once 'parts/'.$params['layout'].'.php';
        } else {
            echo $content;
        }
        if(file_exists('./template/parts/footer-'.$params['layout'].'.php')){
            require_once 'parts/footer-'.$params['layout'].'.php';
        }
    }

    require_once 'parts/footer.php';