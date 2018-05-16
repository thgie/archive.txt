<div id="blog">

    <?php

    $posts = array_reverse(subfoldering('./content/blog'));

    foreach($posts as $key => $path){

        $file = $path.'/index.txt';
        $file_content = remove_utf8_bom(file_get_contents($file));

        $page = explode('---', $file_content);
        $params = $Yaml::parse($page[0]);
        $content = $Parsedown->text($page[1]);

        if($params['title'] != ''){
            echo '<article>';
                echo '<div>';
                    echo '<a href="'.str_replace('./content', '', $path).'"></a>';
                echo '</div>';
                echo '<div class="text">';
                    echo '<h2><a href="'.str_replace('./content', '', $path).'">'.$params['title'].'</a></h2>';
                    echo '<p class="excerpt">'.$params['description'].'<span class="post-grad"></span></p>';
                    echo '<div class="meta">';
                        echo '<em>';

                        $num_tags = count($params['tags']);
                        $i = 0;

                        foreach($params['tags'] as $key => $tag){
                            echo '<a href="#">'.$tag.'</a>';

                            if(++$i < $num_tags) {
                                echo ' — ';
                            }
                        }

                        echo '</em>';
                        echo '<time datetime="'.$params['date'].'">'.$params['date'].'</time>';
                    echo '</div>';
                echo '</div>';
            echo '</article>';
        }
    }

    ?>

</div>
