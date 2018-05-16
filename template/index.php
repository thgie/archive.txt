<?php

    require_once 'parts/header.php';

    if(isset($params['layout'])){
        if(file_exists('./template/parts/'.$params['layout'].'.php')){
            require_once 'parts/'.$params['layout'].'.php';
        }
    } else {
        echo $content;
    }

    require_once 'parts/footer.php';
