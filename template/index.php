<?php

    require_once 'parts/header.php';

    echo $content;

    if(isset($params['gallery'])){
        require_once 'parts/gallery.php';
    }

    require_once 'parts/footer.php';