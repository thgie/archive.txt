<main id="main" class="container">

    <div class="row article-holder">
        <!-- Post -->

        <?php

        $posts = array_reverse(subfoldering('./content/blog'));

        foreach($posts as $key => $path){

            $file = $path.'/index.txt';
            $file_content = remove_utf8_bom(file_get_contents($file));

            $page = explode('---', $file_content);
            $params = $Yaml::parse($page[0]);
            $content = $Parsedown->text($page[1]);

            if($params['title'] != ''){
                echo '<article class="post-article col-sm-4 col-xs-12">';
                    echo '<div class="img-holder">';
                        echo '<a href="'.str_replace('./content', '', $path).'">';
    //                        echo '<img src="images/blog-feat-img/img12.jpg" width="455" height="640" alt="image description" class="img-responsive lazy" >';
                            echo '<div class="caption text-center text-lowercase">';
                                echo '<span class="holder"><i class="arrow right-arrow"></i></span>';
                            echo '</div>';
                        echo '</a>';
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
</main>