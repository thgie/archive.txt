<div id="portfolio">

    <?php echo $content; ?>

    <div class="entries">
    <?php

        require __DIR__ . '/../../vendor/autoload.php';

        $Parsedown = new Parsedown();
        
        $dir = './content/'.$params['folder'];
        $files = scandir($dir);
        $entries = [];
        $tags = [];

        foreach($files as $key => $value){
            $path = $dir.DIRECTORY_SEPARATOR.$value;
            if(pathinfo($path, PATHINFO_EXTENSION) == 'md'){
                $page_params = [];

                $page = explode('---', file_get_contents($path));
                if(count($page) > 1){
                    $page_params = get_params($page[0]);
                }

                $entry = [
                    'path' => $path,
                    'title' => $page_params['title'],
                    'tags' => $page_params['tags'],
                    'content' => $Parsedown->text($page[1])
                ];

                if(isset($page_params['tags'])){
                    $_tags = explode(',', $page_params['tags']);
                    foreach($_tags as $key => $tag){
                        if(!in_array($tag, $tags)){
                            $tags[] = $tag;
                        }
                    }
                }

                if(isset($page_params['until'])){
                    $entry['until'] = strtotime($page_params['until']);
                }

                $date = $page_params['date'];
                

                if (!empty($_GET['tag'])) {
                    if(strpos($page_params['tags'], $_GET['tag']) !== false){
                        $entries[strtotime($date)] = $entry;
                    }
                } else {
                    $entries[strtotime($date)] = $entry;
                }
            }
        }

        sort($tags);

        echo '<div class="tags">';
            foreach($tags as $key => $tag){
                echo '<a href="?tag='.$tag.'">'.$tag.'</a> ';
            }
        echo '</div>';

        krsort($entries);

        foreach($entries as $key => $value){

            $dom = new DOMDocument();
            $dom->loadHTML(mb_convert_encoding($value['content'], 'HTML-ENTITIES', 'UTF-8'));
        
            $imgs = $dom->getElementsByTagName('img');

            echo '<div class="entry">';

                echo '<a href="'.str_replace('.md', '', str_replace('./content', '', $value['path'])).'">';
                echo $Parsedown->text($value['title']);
                echo '</a>';

                if(count($imgs) > 0){
                    if(!is_null($imgs[0])){
                        $imgs[0]->setAttribute('src', str_replace('.md', '', $value['path']).'/../'.$imgs[0]->getAttribute('src'));
                        echo '<div class="image">';
                        echo $imgs[0]->C14N();
                        echo '</div>';

                        /*

                        $cleaned_path = str_replace('.md', '', $value['path']);
                        $cleaned_path = str_replace('./', '/', $cleaned_path);
                        $cleaned_path = str_replace('\\', '/', $cleaned_path);

                        echo '<div class="image" style="background-image: url('.$cleaned_path.'/../'.$imgs[0]->getAttribute('src').');">';
                        echo '</div>';

                        */
                    }
                }
                
                echo '<div class="meta">';
                    echo date('d. M Y', $key);
                    if(isset($value['until'])){
                        echo ' - ' . date('d. M Y', $value['until']);
                    }
                    
                    if(isset($value['tags'])){
                        echo ' &mdash; ';
                        $tags = explode(',', $value['tags']);
                        foreach($tags as $key => $tag){
                            echo '<a href="?tag='.$tag.'">'.$tag.'</a>&nbsp;';
                        }
                    }
                echo '</div>';

            echo '</div>';
        }

    ?>
    </div>

</div>
