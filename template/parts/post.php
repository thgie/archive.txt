<div class="meta">
    <time datetime="<?php echo $params['date']; ?>"><?php echo $params['date']; ?></time>
    <em>
    <?php

        $num_tags = count($params['tags']);
        $i = 0;

        foreach($params['tags'] as $key => $tag){
            echo '<a href="#">'.$tag.'</a>';

            if(++$i < $num_tags) {
                echo ' — ';
            }
        }

    ?>
    </em>
</div>
<div class="article">
    <?php echo $content ?>
</div>
