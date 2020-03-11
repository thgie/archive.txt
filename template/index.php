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
        if(strpos($a->getAttribute('href'), 'http') > -1){
            $a->setAttribute('target', '_blank');
        }
    }
    foreach($ps as $p){
        
    }

    $content = $dom->saveHTML();

    if(isset($params['template'])){
        if(file_exists('./template/parts/'.$params['template'].'.php')){
            require_once 'parts/'.$params['template'].'.php';
        }
    } else {
        echo $content;
    }

    ?>
    
    <div class="breadcrumbs">
        <?php

            $parts = explode("/", dirname($_SERVER['REQUEST_URI']));
            echo '<a href="/">/</a> &mdash; ';
            foreach ($parts as $key => $dir) {
                if($dir != '\\'){
                    $url = "";
                    for ($i = 1; $i <= $key; $i++) {
                        $url .= $parts[$i] . '/'; 
                    }
                    if ($dir != "") {
                        echo '<a href="/'.rtrim($url, '/').'">'.$dir.'</a> &mdash; ';
                    }
                }
            }
            echo $params['title'];

        ?>
    </div>

    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>

        <iframe class="filemanager" src="/template/tinyfilemanager/tinyfilemanager.php" frameborder="0"></iframe>

    <?php endif; ?>

    <?php

    require_once 'parts/footer.php';
