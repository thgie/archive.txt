<?php

    require_once 'parts/header.php';

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
